<?php

namespace App\Http\Controllers;

use App\Http\Controllers\EstimatesController;
use App\Models\Leadform;
use App\Models\Lead;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class LeadformsController extends Controller
{
    public function index()
    {
        return Inertia::render('Leadforms/Index', [
            'filters' => Request::all('search'),
            'leadforms' => Auth::user()->account->leadforms()
                ->with('organization')
                ->orderBy('id')
                ->filter(Request::only('search', 'trashed'))
                ->paginate(10)
                ->withQueryString()
                ->through(fn ($leadform) => [
                    'id' => $leadform->id,
                    'name' => $leadform->name,
                    'deleted_at' => $leadform->deleted_at,
                    'organization' => $leadform->organization ? $leadform->organization->only('name') : null,
                ]),
        ]);
    }
    public function create()
    {
        return Inertia::render('Leadforms/Create', [
            'organizations' => Auth::user()->account
                ->organizations()
                ->orderBy('name')
                ->get()
                ->map
                ->only('id', 'name'),

        ]);
    }

    public function store()
    {
        Auth::user()->account->leadforms()->create(
            Request::validate([
                'name' => ['required', 'max:50'],
                'organization_id' => ['nullable', Rule::exists('organizations', 'id')->where(function ($query) {
                    $query->where('account_id', Auth::user()->account_id);
                })],

                /*'funnel_id' => ['required', 'max:50'],*/
            ])
        );

        return Redirect::route('leadforms')->with('success', 'Leadform created.');
    }

    public function edit(Leadform $leadform)
    {
        return Inertia::render('Leadforms/Edit', [
            'leadform' => [
                'id' => $leadform->id,
                'name' => $leadform->name,
                'organization_id' => $leadform->organization_id,
                'deleted_at' => $leadform->deleted_at,
            ],
            'organizations' => Auth::user()->account->organizations()
                ->orderBy('name')
                ->get()
                ->map
                ->only('id', 'name'),
        ]);
    }

    public function update(Leadform $leadform)
    {
        $leadform->update(
            Request::validate([
                'name' => ['required', 'max:50'],
                'organization_id' => [
                    'nullable',
                    Rule::exists('organizations', 'id')->where(fn ($query) => $query->where('account_id', Auth::user()->account_id)),
                ],
                /* 'funnel_id' => ['nullable', Rule::exists('funnels', 'id')->where(function ($query) {
                    $query->where('account_id', Auth::user()->account_id);
                })],*/
            ])
        );

        return Redirect::back()->with('success', 'Leadform updated.');
    }


    public function view()
    {


        return Inertia::render('Leadforms/View', [

            'filters' => Request::all('search', 'trashed'),
            'funnels' => Auth::user()->account->funnels()
                ->with('organization')
                ->orderBy('id')
                ->filter(Request::only('search', 'trashed'))
                ->paginate(15)
                ->withQueryString()
                ->through(fn ($funnel) => [
                    'id' => $funnel->id,
                    'name' => $funnel->name,
                    'line_nr' => $funnel->line_nr,
                    'question' => $funnel->question,
                    'qty' => $funnel->qty,
                    'min_value' => $funnel->min_value,
                    'max_value' => $funnel->max_value,
                    'deleted_at' => $funnel->deleted_at,
                    'organization' => $funnel->organization ? $funnel->organization->only('name') : null,
                    'leadform' => $funnel->leadform ? $funnel->leadform->only('name') : null,
                    'leadform_id' => $funnel->leadform ? $funnel->leadform->only('leadform_id') : null,
                ])

        ]);
    }

    public function destroy(Leadform $leadform)
    {
        $leadform->delete();

        return Redirect::back()->with('success', 'Leadform deleted.');
    }

    public function restore(Leadform $leadform)
    {
        $leadform->restore();

        return Redirect::back()->with('success', 'Leadform restored.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Funnel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class FunnelsController extends Controller
{
    public function index()
    {
        return Inertia::render('Funnels/Index', [
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
                ]),
        ]);
    }

    public function create()
    {
        return Inertia::render('Funnels/Create', [
            'organizations' => Auth::user()->account
                ->organizations()
                ->orderBy('name')
                ->get()
                ->map
                ->only('id', 'name'),
            'leadforms' => Auth::user()->account
                ->leadforms()
                ->orderBy('name')
                ->get()
                ->map
                ->only('id', 'name'),
        ]);
    }

    public function store()
    {
        Auth::user()->account->funnels()->create(
            Request::validate([
                'name' => ['required', 'max:50'],
                'organization_id' => ['nullable', Rule::exists('organizations', 'id')->where(function ($query) {
                    $query->where('account_id', Auth::user()->account_id);
                })],
                'leadform_id' => ['nullable', Rule::exists('leadforms', 'id')->where(function ($query) {
                    $query->where('account_id', Auth::user()->account_id);
                })],
                'line_nr' => ['required', 'max:50'],
                'question' => ['required', 'max:50'],
                'qty' => ['required', 'max:50'],
                'min_value' => ['required', 'max:50'],
                'max_value' => ['required', 'max:50'],
                'leadform_id' => ['nullable', 'max:50'],
            ])
        );

        return Redirect::route('funnels')->with('success', 'funnel created.');
    }

    public function edit(Funnel $funnel)
    {
        return Inertia::render('Funnels/Edit', [
            'funnel' => [
                'id' => $funnel->id,
                'name' => $funnel->name,
                'organization_id' => $funnel->organization_id,
                'line_nr' => $funnel->line_nr,
                'question' => $funnel->question,
                'qty' => $funnel->qty,
                'min_value' => $funnel->min_value,
                'max_value' => $funnel->max_value,
                'leadform_id' => $funnel->leadforms_id,
            ],
            'organizations' => Auth::user()->account->organizations()
                ->orderBy('name')
                ->get()
                ->map
                ->only('id', 'name'),
            'leadforms' => Auth::user()->account->leadforms()
                ->orderBy('name')
                ->get()
                ->map
                ->only('id', 'name'),

        ]);
    }

    public function update(Funnel $funnel)
    {
        $funnel->update(
            Request::validate([
                'name' => ['required', 'max:50'],
                'organization_id' => [
                    'nullable',
                    Rule::exists('organizations', 'id')->where(fn ($query) => $query->where('account_id', Auth::user()->account_id)),
                ],
                'email' => ['nullable', 'max:50', 'email'],
                'line_nr' => ['required', 'max:50'],
                'question' => ['required', 'max:50'],
                'qty' => ['nullable', 'max:50'],
                'min_value' => ['nullable', 'max:50'],
                'max_value' => ['nullable', 'max:50'],
                'leadform_id' => ['nullable', Rule::exists('leadforms', 'id')->where(function ($query) {
                    $query->where('account_id', Auth::user()->account_id);
                })],

            ])
        );

        return Redirect::back()->with('success', 'Funnel updated.');
    }

    public function destroy(Funnel $funnel)
    {
        $funnel->delete();

        return Redirect::back()->with('success', 'Funnel deleted.');
    }

    public function restore(Funnel $funnel)
    {
        $funnel->restore();

        return Redirect::back()->with('success', 'Funnel restored.');
    }
}

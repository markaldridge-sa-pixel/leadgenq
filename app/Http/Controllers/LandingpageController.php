<?php

namespace App\Http\Controllers;

use App\Models\Landingpage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class FunnelsController extends Controller
{
    public function index()
    {
        return Inertia::render('Landingpage/Index', [
            'funnels' => Auth::user()->account->funnels()
                ->with('organization')
                ->orderBy('id')
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
}

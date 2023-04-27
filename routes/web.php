<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\OrganizationsController;
use App\Http\Controllers\FunnelsController;
use App\Http\Controllers\LeadformsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\EstimatesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Auth

Route::get('login', [AuthenticatedSessionController::class, 'create'])
    ->name('login')
    ->middleware('guest');

Route::post('login', [AuthenticatedSessionController::class, 'store'])
    ->name('login.store')
    ->middleware('guest');

Route::delete('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');

// Dashboard

Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware('auth');

// Users

Route::get('users', [UsersController::class, 'index'])
    ->name('users')
    ->middleware('auth');

Route::get('users/create', [UsersController::class, 'create'])
    ->name('users.create')
    ->middleware('auth');

Route::post('users', [UsersController::class, 'store'])
    ->name('users.store')
    ->middleware('auth');

Route::get('users/{user}/edit', [UsersController::class, 'edit'])
    ->name('users.edit')
    ->middleware('auth');

Route::put('users/{user}', [UsersController::class, 'update'])
    ->name('users.update')
    ->middleware('auth');

Route::delete('users/{user}', [UsersController::class, 'destroy'])
    ->name('users.destroy')
    ->middleware('auth');

Route::put('users/{user}/restore', [UsersController::class, 'restore'])
    ->name('users.restore')
    ->middleware('auth');

// Organizations

Route::get('organizations', [OrganizationsController::class, 'index'])
    ->name('organizations')
    ->middleware('auth');

Route::get('organizations/create', [OrganizationsController::class, 'create'])
    ->name('organizations.create')
    ->middleware('auth');

Route::post('organizations', [OrganizationsController::class, 'store'])
    ->name('organizations.store')
    ->middleware('auth');

Route::get('organizations/{organization}/edit', [OrganizationsController::class, 'edit'])
    ->name('organizations.edit')
    ->middleware('auth');

Route::put('organizations/{organization}', [OrganizationsController::class, 'update'])
    ->name('organizations.update')
    ->middleware('auth');

Route::delete('organizations/{organization}', [OrganizationsController::class, 'destroy'])
    ->name('organizations.destroy')
    ->middleware('auth');

Route::put('organizations/{organization}/restore', [OrganizationsController::class, 'restore'])
    ->name('organizations.restore')
    ->middleware('auth');

// Contacts

Route::get('contacts', [ContactsController::class, 'index'])
    ->name('contacts')
    ->middleware('auth');

Route::get('contacts/create', [ContactsController::class, 'create'])
    ->name('contacts.create')
    ->middleware('auth');

Route::post('contacts', [ContactsController::class, 'store'])
    ->name('contacts.store')
    ->middleware('auth');

Route::get('contacts/{contact}/edit', [ContactsController::class, 'edit'])
    ->name('contacts.edit')
    ->middleware('auth');

Route::put('contacts/{contact}', [ContactsController::class, 'update'])
    ->name('contacts.update')
    ->middleware('auth');

Route::delete('contacts/{contact}', [ContactsController::class, 'destroy'])
    ->name('contacts.destroy')
    ->middleware('auth');

Route::put('contacts/{contact}/restore', [ContactsController::class, 'restore'])
    ->name('contacts.restore')
    ->middleware('auth');

// Funnels

Route::get('funnels', [FunnelsController::class, 'index'])
    ->name('funnels')
    ->middleware('auth');


Route::get('funnels/create', [FunnelsController::class, 'create'])
    ->name('funnels.create')
    ->middleware('auth');


Route::post('funnels', [FunnelsController::class, 'store'])
    ->name('funnels.store')
    ->middleware('auth');


Route::get('funnels/{funnel}/edit', [FunnelsController::class, 'edit'])
    ->name('funnels.edit')
    ->middleware('auth');


Route::put('funnels/{funnel}', [FunnelsController::class, 'update'])
    ->name('funnels.update')
    ->middleware('auth');


Route::delete('funnels/{funnel}', [FunnelsController::class, 'destroy'])
    ->name('funnels.destroy')
    ->middleware('auth');


Route::put('funnels/{funnel}/restore', [FunnelsController::class, 'restore'])
    ->name('funnels.restore')
    ->middleware('auth');



// Leadforms

Route::get('leadforms', [LeadformsController::class, 'index'])
    ->name('leadforms')
    ->middleware('auth');

Route::get('leadforms/create', [LeadformsController::class, 'create'])
    ->name('leadforms.create')
    ->middleware('auth');


Route::post('leadforms', [LeadformsController::class, 'store'])
    ->name('leadforms.store')
    ->middleware('auth');


Route::get('leadforms/{leadform}/edit', [LeadformsController::class, 'edit'])
    ->name('leadforms.edit')
    ->middleware('auth');


Route::put('leadforms/{leadform}', [LeadformsController::class, 'update'])
    ->name('leadforms.update')
    ->middleware('auth');


Route::delete('leadforms/{leadform}', [LeadformsController::class, 'destroy'])
    ->name('leadforms.destroy')
    ->middleware('auth');


Route::put('leadforms/{leadform}/restore', [LeadformsController::class, 'restore'])
    ->name('leadforms.restore')
    ->middleware('auth');

Route::get('leadforms/{leadform}/view', [LeadformsController::class, 'view'])
    ->name('leadforms.view')
    ->middleware('auth');

/*Route::get('leadforms/{leadform}/view', function () {
    return Inertia::render('Estimates', [
        'estimates' => Estimate::all()
    ]);
});*/

Route::get('leadforms/{leadform}/step1', [LeadformsController::class, 'step1'])
    ->name('leadforms.step1')
    ->middleware('auth');

Route::get('leadforms/{leadform}/step2', [LeadformsController::class, 'step2'])
    ->name('leadforms.step2')
    ->middleware('auth');

Route::get('leadforms/{leadform}/step3', [LeadformsController::class, 'step3'])
    ->name('leadforms.step3')
    ->middleware('auth');

Route::get('leadforms/{leadform}/step4', [LeadformsController::class, 'step4'])
    ->name('leadforms.step4')
    ->middleware('auth');

Route::get('leadforms/{leadform}/step5', [LeadformsController::class, 'step5'])
    ->name('leadforms.step5')
    ->middleware('auth');

Route::get('leadforms/{leadform}/step6', [LeadformsController::class, 'step6'])
    ->name('leadforms.step6')
    ->middleware('auth');

Route::get('leadforms/{leadform}/step7', [LeadformsController::class, 'step7'])
    ->name('leadforms.step7')
    ->middleware('auth');

Route::get('leadforms/{leadform}/step8', [LeadformsController::class, 'step8'])
    ->name('leadforms.step8')
    ->middleware('auth');

Route::get('leadforms/{leadform}/step9', [LeadformsController::class, 'step9'])
    ->name('leadforms.step9')
    ->middleware('auth');

Route::get('leadforms/{leadform}/step10', [LeadformsController::class, 'step10'])
    ->name('leadforms.step9')
    ->middleware('auth');

Route::get('leadforms/{leadform}/step11', [LeadformsController::class, 'finalStep'])
    ->name('leadforms.finalStep')
    ->middleware('auth');

// Get Esimates data

Route::get('estimates', [EstimatesController::class, 'index'])
    ->name('estimates')
    ->middleware('auth');


// landing pages require

Route::get('landingpage', [LandingpageController::class, 'index'])
    ->name('landingpage')
    ->middleware('auth');

// lead

Route::get('leads', [LeadController::class, 'index'])
    ->middleware('auth');

// Images

Route::get('/img/{path}', [ImagesController::class, 'show'])
    ->where('path', '.*')
    ->name('image');

// File upload
Route::get('fileuploads', [FileController::class, 'index']);
Route::post('/upload', [FileController::class, 'upload'])->name('upload');

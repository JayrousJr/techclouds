<?php

use App\Models\Project;
use App\Models\Service;
use App\Models\ProjectClass;
use App\Models\ServiceOrder;
use App\Models\SocialNetwork;
use App\Models\ServiceRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProcessController;
use App\Http\Controllers\RequestsController;
use App\Http\Controllers\SiteLinkController;
use App\Http\Controllers\MessageJetController;
use App\Http\Controllers\Filament\LogoutController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('visitor')->group(function () {
    Route::get('/', function () {

        $data['socialnetwork'] = SocialNetwork::all();
        $data['services'] = Service::whereIn('is_Active', [1])->get();
        $data['class'] = ProjectClass::whereIn('is_Active', [1])->get();
        $data['projects'] = ServiceOrder::all();
        $count = Service::count();
        $counter = ServiceOrder::count();
        return view(
            '/site/index',
            $data,
            ['count' => $count],
        );
    })->name('home');
});
// Route::get('/email', function () {
//     return view('/emails/service/emailservice');
// });
// Route::get('/feed', function () {
//     return view('/emails/service/emailservicefeed');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/about', [SiteLinkController::class, 'about']);
Route::get('/services', [SiteLinkController::class, 'services']);
Route::get('/contact', [SiteLinkController::class, 'contact']);
Route::get('/gallery', [SiteLinkController::class, 'gallery']);
Route::get('/qdkFkcldLTVdDTWcyaEJYSWpRR01taOCI7czoY2OiJfZDmxhc2giO2ER6Mjp7{project}czozOiJvbGQiO2E6MDAp7fXM6MYzoibmRV3IjthOjA6e319Uczo5OiJfcHS', [SiteLinkController::class, 'viewproject']);
Route::get('/cmwiO3TM6MzE6Imh0dCA6Ly9sb2NhHbGhvc3Q6ODAwMC9zZXJ2aWNlLTIiO31zOjY6Il9mbGUFzaC{service}I7YTDoyOntzOjM6ImS9s', [SiteLinkController::class, 'serviceSingle']);
Route::get('/ntzOjM6TM6MzE6Imh0dCA6Ly9sbJ2NO3HbG3Qmwi2DhaWNlLFza6OvcAwhcCYbTIiDoIUyO6{blog}Il9mO31zOjG7YTImSMC9zZX9s', [SiteLinkController::class, 'blog']);
Route::get('/projects', [SiteLinkController::class, 'projects']);



// jetstream pages
Route::middleware(['auth', 'verified'])->group(function () {
    Route::post('/process/contact', [ProcessController::class, 'processMessage']);
    Route::post('/makeorder-{service}', [ProcessController::class, 'makeOrder']);
    Route::resource('mymessages', MessageJetController::class);
    Route::resource('myrequests', RequestsController::class);
    Route::resource('myorders', OrdersController::class);
});

Route::post('/auth/logout', [LogoutController::class, 'logout'])->name('filament.admin.auth.logout');

// Route::get('counter', function () {
//     return view('/livewire/counter');
// });
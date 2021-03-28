<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopConfigurationController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard/{success?}/{message?}', [ShopConfigurationController::class, 'loadDashboard'])->name('dashboard');
    
    Route::view('/load_installation_form', 'installation_form')->name('load_installation_form');
    
    Route::post('/update_configuration', [ShopConfigurationController::class, 'updateConfiguration'])->name('update_configuration');
    
    Route::post('/install_plugin', [ShopConfigurationController::class, 'installPlugin'])->name('install_plugin');

    Route::get('/redirect', [ShopConfigurationController::class, 'redirectedUser'])->name('redirect');

});

require __DIR__.'/auth.php';

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Billing;
use App\Http\Livewire\Notifications;
use App\Http\Livewire\Profile;
use App\Http\Livewire\Tables;

use App\Http\Livewire\GuestLivewire;
use App\Http\Livewire\CheckLivewire;

use App\Http\Livewire\Auth\LoginLivewire;
use App\Http\Livewire\JenisServiceLaundryLivewire;
use App\Http\Livewire\DashboardLivewire;
use App\Http\Livewire\TransactionsLivewire;
use App\Http\Livewire\DetailTransactionsLivewire;
use App\Http\Livewire\FinanceLivewire;
use GuzzleHttp\Middleware;

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

// USED
Route::get('/', function(){
    return redirect(route('user-home'));
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', GuestLivewire::class)->name('user-home');
    Route::prefix('user')->group(function () {
        Route::get('/home', GuestLivewire::class)->name('user-home');
        Route::get('/check', CheckLivewire::class)->name('user-check');
    });
});

Route::get('admin/sign-in', LoginLivewire::class)->middleware('guest')->name('login');

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('admin')->group(function () {
        // USED
        Route::get('/', DashboardLivewire::class)->name('dashboard');
        Route::get('dashboard', DashboardLivewire::class)->name('dashboard');
        Route::get('transactions', TransactionsLivewire::class)->name('transactions');
        Route::get('transactions/{id}', DetailTransactionsLivewire::class)->name('detail-transactions');
        Route::get('services', JenisServiceLaundryLivewire::class)->name('services');
        Route::get('finance', FinanceLivewire::class)->name('finance');
        Route::get('/check', GuestLivewire::class)->name('admin-check');
    });
});
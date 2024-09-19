<?php

use App\Livewire\Admin\Pages\Index as AdminIndex;
use App\Livewire\User\Pages\Index as UserIndex;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Global\Pages\Landing;
use App\Livewire\SuperAdmin\Pages\Dashboard;
use App\Livewire\SuperAdmin\Users\Index as AccountManagementIndex;
use Illuminate\Support\Facades\Route;

Route::get('/', Landing::class);
Route::get('/sign-up', Register::class);
Route::get('/login', Login::class)->name('login');

Route::group(['middleware' => ['auth', 'verified', 'role:super_admin']], function () {
    Route::get('/super-admin/dashboard', Dashboard::class);
    Route::get('/super-admin/user-account-management', AccountManagementIndex::class);
});

Route::group(['middleware' => ['auth', 'verified', 'role:admin|super_admin']], function () {
    Route::get('/admin/dashboard', AdminIndex::class);
});


Route::group(['middleware' => ['auth', 'verified', 'role:user|admin|super_admin']], function () {
    Route::get('/home', UserIndex::class);
});

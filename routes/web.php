<?php

use App\Livewire\Admin\Pages\Index as AdminIndex;
use App\Livewire\User\Pages\Index as UserIndex;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Global\Pages\Landing;
use Illuminate\Support\Facades\Route;

Route::get('/', Landing::class);
Route::get('/sign-up', Register::class);
Route::get('/login', Login::class);

Route::group(['middleware' => ['auth', 'verified', 'role:admin']], function () {
    Route::get('/admin/dashboard', AdminIndex::class);
});


Route::group(['middleware' => ['auth', 'verified', 'role:user']], function () {
    Route::get('/home', UserIndex::class);
});

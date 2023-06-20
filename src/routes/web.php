<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\User\{
        UserTable,
        UserCreate,
        UserUpdate
    };

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Users routers
    Route::get('users', UserTable::class)->name('users');
    Route::get('users/create', UserCreate::class)->name('users.create');
    Route::get('users/{id}', UserUpdate::class)->name('users.update')->where('id', '[0-9]+');  
    
    


});

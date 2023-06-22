<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\User\{
        UserTable,
        UserCreate,
        UserUpdate
    };
use App\Http\Livewire\Classroom\{
        ClassroomTable,
        ClassroomCreate,
        ClassroomUpdate
};
use App\Http\Livewire\Coffeebreak\{
        CoffeebreakTable,
        CoffeebreakCreate,
        CoffeebreakUpdate
};
use App\Http\Livewire\Customer\{
        CustomerTable,
        CustomerCreate,
        CustomerUpdate
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
    
    // Classroons routers
    Route::get('classrooms', ClassroomTable::class)->name('classrooms');
    Route::get('classrooms/create', ClassroomCreate::class)->name('classrooms.create');
    Route::get('classrooms/{id}', ClassroomUpdate::class)->name('classrooms.update')->where('id', '[0-9]+');  ;

    // Coffeebreaks routers
    Route::get('coffeebreaks', CoffeebreakTable::class)->name('coffeebreaks');
    Route::get('coffeebreaks/create', CoffeebreakCreate::class)->name('coffeebreaks.create');
    Route::get('coffeebreak/{id}', CoffeebreakUpdate::class)->name('coffeebreaks.update')->where('id', '[0-9]+');  ;

    // Customers routers
    Route::get('customers', CustomerTable::class)->name('customers');
    Route::get('customers/create', CustomerCreate::class)->name('customers.create');
    Route::get('customers/{id}', CustomerUpdate::class)->name('customers.update')->where('id', '[0-9]+');  ;

});

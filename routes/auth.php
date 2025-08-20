<?php

use Illuminate\Support\Facades\Route;

Route::post('logout', App\Livewire\Auth\Logout::class)->name('logout');

<?php

use Illuminate\Support\Facades\Route;

Route::get('dashboard', App\Livewire\ControlPanel\Dashboard::class)->name('dashboard');

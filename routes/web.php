<?php

use Illuminate\Support\Facades\Route;

Route::get('/', App\Livewire\ControlPanel\Dashboard::class)->name('home');
Route::get('contact', App\Livewire\ControlPanel\Dashboard::class)->name('contact');

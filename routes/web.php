<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('control-panel.dashboard');
})->name('home');
Route::get('contact', App\Livewire\ControlPanel\Dashboard::class)->name('contact');

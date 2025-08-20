<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('control-panel.dashboard');
})->name('home');
Route::get('contact', App\Livewire\ControlPanel\Dashboard::class)->name('contact');
Route::get('terms-and-conditions', App\Livewire\ControlPanel\Dashboard::class)->name('terms-and-conditions');
Route::get('privacy-policy', App\Livewire\ControlPanel\Dashboard::class)->name('privacy-policy');

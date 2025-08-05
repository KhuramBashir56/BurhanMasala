<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Guest;

Route::get('login', Guest\Login::class)->name('login');
Route::get('register', Guest\Register::class)->name('register');
Route::get('forgot-password', Guest\ForgotPassword::class)->name('forgot-password');
Route::get('reset-password/{token}', Guest\ResetPassword::class)->name('reset-password');
Route::get('terms-and-conditions', Guest\ResetPassword::class)->name('terms-and-conditions');
Route::get('privacy-policy', Guest\ResetPassword::class)->name('privacy-policy');

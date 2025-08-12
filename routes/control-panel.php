<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\ControlPanel\UserManagement\Roles;

Route::get('dashboard', App\Livewire\ControlPanel\Dashboard::class)->name('dashboard');
// Route::get('settings', App\Livewire\ControlPanel\Settings::class)->name('settings');
Route::prefix('user-management')->name('user-management.')->group(function () {
    Route::get('roles-list', Roles\RolesList::class)->name('roles-list');
    Route::get('create-role', Roles\CreateRole::class)->name('create-role');
    Route::get('{role}/edit-role', Roles\EditRole::class)->name('edit-role');
    Route::get('{role}/view-role-has-permissions', Roles\PermissionsList::class)->name('view-role-has-permissions');
});


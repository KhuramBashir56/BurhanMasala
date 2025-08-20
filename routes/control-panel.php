<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\ControlPanel\UserManagement as User;
use App\Livewire\ControlPanel\MarketManagement as Market;

Route::get('dashboard', App\Livewire\ControlPanel\Dashboard::class)->name('dashboard');
Route::get('settings', App\Livewire\ControlPanel\Settings::class)->name('settings');
Route::get('user-profile', App\Livewire\ControlPanel\UserProfile::class)->name('user-profile');
Route::prefix('user-management')->name('user-management.')->group(function () {
    Route::get('roles-list', User\Roles\RolesList::class)->name('roles-list');
    Route::get('create-role', User\Roles\CreateRole::class)->name('create-role');
    Route::get('{role}/edit-role', User\Roles\EditRole::class)->name('edit-role');
    Route::get('{role}/view-role-has-permissions', User\Roles\PermissionsList::class)->name('view-role-has-permissions');
});
Route::prefix('market-management')->name('market-management.')->group(function () {
    Route::get('districts-list', Market\Districts\DistrictsList::class)->name('districts-list');
    Route::get('add-new-district', Market\Districts\AddNewDistrict::class)->name('add-new-district');
    Route::get('{district}/edit-district', Market\Districts\EditDistrict::class)->name('edit-district');
    Route::get('cities-list', Market\Cities\CitiesList::class)->name('cities-list');
    Route::get('add-new-city', Market\Cities\AddNewCity::class)->name('add-new-city');
    Route::get('{city}/edit-city', Market\Cities\EditCity::class)->name('edit-city');
});

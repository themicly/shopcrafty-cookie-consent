<?php

// Authenticated admin routes for the CookieConsent add-on.

use Illuminate\Support\Facades\Route;

Route::view('/settings/privacy', 'cookieconsent::admin.settings.privacy')
    ->name('settings.privacy')
    ->middleware('can:manage-config');

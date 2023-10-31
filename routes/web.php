<?php


use Brucelwayne\Contact\Controllers\ContactUsController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::middleware(['web', 'localizationRedirect'])
    ->prefix(LaravelLocalization::setLocale())
    ->group(function () {
        //show contact us form
        Route::get('/contact-us', [ContactUsController::class, 'index'])
            ->name('contact-us');
        //save post data
        Route::post('/contact-us', [ContactUsController::class, 'store']);
    });

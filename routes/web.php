<?php


use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::middleware(['web', 'tenant:guest', 'localizationRedirect'])
    ->prefix(LaravelLocalization::setLocale())
    ->group(function () {
        //show contact us form
//        Route::get('contact-us', [ContactUsController::class, 'index'])
//            ->middleware(['inertia'])
//            ->name('contact-us');
        //save post data
//        Route::post('contact-us', [ContactUsController::class, 'store']);
    });

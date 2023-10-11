<?php


use Brucelwayne\Contact\Controllers\ContactUsController;
use Illuminate\Support\Facades\Route;

Route::middleware('web')->group(function () {
    //show contact us form
    Route::get('/contact-us', [ContactUsController::class, 'index'])
        ->name('contact-us');
    //save post data
    Route::post('/contact-us', [ContactUsController::class, 'store']);
});
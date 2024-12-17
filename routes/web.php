<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WhatsappController;


Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/sobha-townpark', function () {
    return view('sobha_manhattan');
})->name('sobha-townpark');

Route::get('/sobha-ayana', function () {
    return view('sobha_ayana');
})->name('sobha-ayana');

Route::get('/sobha-neopolis', function () {
    return view('sobha_neopolis');
})->name('sobha-neopolis');

Route::post('/send-contact-details', [WhatsappController::class, 'sendContactDetails'])->name('send.contact.details');

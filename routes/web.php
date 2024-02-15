<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//MainControllers
Route::get('/articles', [MainController::class, 'index']);
Route::get('/full-img/{img}', [MainController::class, 'show']);

Route::get('/', function () {
    return view('layout');
});

Route::get('/contacts', function(){
    $contacts = [
        'univer' => 'Polytech',
        'phone' => '8(945)484-3443',
        'email' => 'da@mail.ru'
    ];
return view('main.contact', ['contacts'=>$contacts]);
});
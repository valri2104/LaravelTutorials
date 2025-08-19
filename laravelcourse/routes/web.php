<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");
Route::get('/products', 'App\Http\Controllers\ProductController@index')->name("product.index");
Route::get('/products/create', 'App\Http\Controllers\ProductController@create')->name("product.create");
Route::post('/products/save', 'App\Http\Controllers\ProductController@save')->name("product.save");
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name("product.show");

Route::get('/about', function () {
    $data1 = "About us - Online Store";
    $data2 = "About us";
    $description = "This is an about page ...";
    $author = "Developed by: Valeria Cardona";
    return view('home.about')->with("title", $data1)
        ->with("subtitle", $data2)
        ->with("description", $description)
        ->with("author", $author);
})->name("home.about");

Route::get('/contact', function () {
    $data3 = 'Contact us - Online Store';
    $data4 = 'Contact us';
    $email = 'onlinestore@outlook.com';
    $address = 'Transversal 59D sur #22-43';
    $number = '3124567890';
    return view('home.contact')->with('title', $data3)
        ->with('subtitle', $data4)
        ->with('email', $email)
        ->with('address', $address)
        ->with('number', $number);
})->name('home.contact');

Auth::routes();

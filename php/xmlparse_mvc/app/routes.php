<?php

// =========== ROUTING (based on Macaw) ==========================================================

use Core\Route; // I edited original Macaw router because last trailing slash was weird and displayed 404 page
use Helpers\Hooks;


Route::any('', 'App\Controllers\Home@index');
Route::any('home', 'App\Controllers\Home@index');

Route::any('import/xml', 'App\Controllers\InputOutput@xmlimport'); //xml import
Route::any('import/csv', 'App\Controllers\InputOutput@csvimport');
Route::any('export/html', 'App\Controllers\InputOutput@exportToHtml');

Route::any('termekek', 'App\Controllers\Product@productsList');

// maybe for cms pages
//Route::any('(:any)', 'App\Controllers\Welcome@subPage');
//Route::any('welcome', 'App\Controllers\Welcome@index');

// If no Macaw found. 
Route::error('Core\Error@index');

//Turn on old style routing.
//Route::$fallback = false;


Route::dispatch();



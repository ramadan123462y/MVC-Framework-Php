<?php





use APP\controllers\homecontroller;
use APP\core\Route;








/***
 * 
 * 
 * Routes
 * 
 * 
 */


 
Route::get('/home/index', [homecontroller::class, 'index']);

Route::post('/home/store', [homecontroller::class, 'store']);

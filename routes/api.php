<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// }); 

// Route::group(['middleware' => 'api'], function() {
//     Route::post('register', 'AuthController@register');
// });

    Route::group(['middleware' => 'api'], function() {
        //Auth
        Route::get('users','AuthController@index');  
        Route::post('login','AuthController@login');  
        Route::post('register','AuthController@register');  
        //Book
        Route::get('books','BookController@index');  
        Route::post('books','BookController@store');
        Route::get('books/{book}', 'BookController@show');
        Route::put('books/{book}','BookController@update');
        Route::delete('books/{book}', 'BookController@delete');
        //Borrow
        Route::get('borrowsNotConfirm', 'BorrowController@BorrowsNotConfirm');
        Route::put('acceptBorrow/{borrow}','BorrowController@acceptBorrow');
        Route::put('declineBorrow/{borrow}','BorrowController@declineBorrow');
        Route::get('returnNotConfirm', 'BorrowController@returnNotConfirm');
        Route::put('acceptReturn/{borrow}','BorrowController@acceptReturn');
        Route::put('declineReturn/{borrow}','BorrowController@declineReturn');
        Route::post('requestBorrow','BorrowController@borrowRequest');
        Route::post('borrowed', 'BorrowController@borrowedBook');
        Route::put('returnBook/{borrow}', 'BorrowController@returnRequest');
    });
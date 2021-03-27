<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//roomtype
Route::post('/roomtype/storeRoomType', 'RoomtypeController@store');
Route::get('/roomtype/viewRoomType', 'RoomtypeController@index');
Route::put('/roomtype/updateRoomType/{id}', 'RoomtypeController@update');
Route::delete('/roomtype/deleteRoomType/{id}', 'RoomtypeController@delete');

//room
Route::post('/room/storeRoom', 'RoomController@store');
Route::get('/room/viewRoom', 'RoomController@index');
Route::put('/room/updateRoom/{id}', 'RoomController@update');
Route::delete('/room/deleteRoom/{id}', 'RoomController@delete');

//roomtype_detail
Route::get('/roomtype_detail/viewRoomTypeDetail/{room_type_id}', 'RoomType_DetailController@index');
Route::post('/roomtype_detail/addRoomTypeDetail/{room_type_id}', 'RoomType_DetailController@store');
Route::put('/roomtype_detail/updateRoomTypeDetail/{room_type_id}', 'RoomType_DetailController@update');










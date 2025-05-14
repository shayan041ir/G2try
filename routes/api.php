<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UploadController;






// finish upload file save in db and storage
Route::post('/upload/img',[UploadController::class , 'uploadimage']);


// curd finish
Route::post('/post/create' , [PostController::class , 'create']);
Route::put('/post/update/{id}' , [PostController::class , 'update']);
Route::delete('/post/delete/{id}' , [PostController::class , 'delete']);
Route::get('/post/all/' , [PostController::class , 'select']);






// whit out json
// Route::get('/hello', function(){
//     return Response('hello world');
// });

// with json and get
// Route::get('/hello', function(){
//     return Response()->json('hello world',200);
// });

// with json and post
// Route::post('/hello', function(){
//     return Response()->json('hello world',200);
// });

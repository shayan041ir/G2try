<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\Post;



Route::post('/post/create' , [PostController::class , 'create']);
Route::post('/post/update' , [PostController::class , 'update']);






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

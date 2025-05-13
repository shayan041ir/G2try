<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Exception;

class PostController extends Controller
{
    // create post
    public function create(Request $request)
    {
        $inp = $request->only([
        'title',
        'cover',
        'category',
        'author',
        'content',
        'keyword',
        'caption',
        'isCommentOn'
        ]);

        try{
            $post = Post::create($inp);
            return Response()->json($post,200);
        }catch(Exception $e){
            return Response()->json($e,400);
        }

    }

    // update post
    public function update(Request $request)
    {
        $inp = $request->only([
        'title',
        'cover',
        'category',
        'author',
        'content',
        'keyword',
        'caption',
        'isCommentOn'
        ]);

        try{
            $post = Post::where('id',$request->id)->update($inp);
            return Response()->json('update',200);
        }catch(Exception $e){
            return Response()->json($e,400);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Exception;
use GuzzleHttp\Psr7\Response;

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

        try {
            $post = Post::create($inp);
            return Response()->json($post, 200);
        } catch (Exception $e) {
            return Response()->json($e, 400);
        }
    }

    // update post
    public function update(Request $request, $id)
    {
        $inp = $request->only([
            'id',
            'title',
            'cover',
            'category',
            'author',
            'content',
            'keyword',
            'caption',
            'isCommentOn'
        ]);

        try {
            $post = Post::where(['id' => $id])->update($inp);
            return Response()->json('update', 200);
        } catch (Exception $e) {
            return Response()->json($e, 400);
        }
    }

    // delete post
    public function delete($id)
    {
        try {
            $post = Post::where(['id' => $id])->delete();
            return Response()->json('deleted', 200);
        } catch (Exception $e) {
            return Response()->json($e, 400);
        }
    }

    public function select(Request $request)
    {
        //for get id after /all
        // return Response()->json($id, 200);

        // for get requests 
        // return Response()->json($request, 200);

        // for get select cateegory
        $filters = $request->only([
            'id',
            'category',
        ]);

        if(count($filters))
            $posts = Post::where(["category"=>$filters])->get();
        else
            $posts = Post::all();

        return Response()->json($posts, 200);
        
    }

}

<?php

namespace App\Http\Controllers;

use App\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __contruct(){

    }

    public function validateRequest(Request $request){
        $rules = [
            'title' => 'required',
            'content' => 'required'
        ];

        $this->validate($request, $rules);
    }

    public function isAuthorized(Request $request){

    }

    public function index(){
        $posts = Post::all();
        return $this->success($posts, 200); // $data, $responsecode
    }

    public function store(Request $request){
        $this->validateRequest($request);
        $post = Post::create([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'user_id' => $this->getUserId()
        ]);

        return $this->success('Post w ID {$post->id} has been created', 201);
    }

    public function show($id){
        $post = Post::find($id);

        if(!$post){
            return $this->error('Post w ID {$post->id} dosent exist', 404);
        }

        return $this->success($post, 200);
    }

    public function update(Request $request, $id){
        $post = Post::find($id);

        if(!$post){
            return $this->error('Post w ID {$post->id} dosent exist', 404);
        }
        $this->validateRequest($request);

        $post->title = $request->get('title');
        $post->content = $request->get('content');
        $post->user_id = $this->getUserId();
        $post->save();

        return $this->success('Post w ID {$post->id} has been updated.',200);
    }

    public function destroy($id){
        $post = Post::find($id);

        if(!$post){
			return $this->error("The post with {$id} doesn't exist", 404);
        }
		// no need to delete the comments for the current post,
		// since we used on delete cascase on update cascase.
		// $post->comments()->delete();
        $post->delete();
        return $this->success('Post w ID {$post->id} has been deleted along with its comments', 200);
    }
}

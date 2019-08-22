<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(){
        $comments = Comment::all();
        return $this->success($comments, 200);
    }

    public function show($id){
        $comment = Comment::find($id);

        if($comment){
			return $this->error("The comment with {$id} doesn't exist", 404);
		}
		return $this->success($comment, 200);
    }
}

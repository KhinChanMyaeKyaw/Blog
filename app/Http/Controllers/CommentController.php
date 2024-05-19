<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Gate;


class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    public function create(Request $request)
    {
        $request->validate(["content"=> "required"]);

        $comment= new Comment;
        $comment->content = $request->content;
        $comment->article_id = $request->article_id;
        $comment->user_id= auth()->user()->id;
        // To get user_id from session with auth method

        $comment->save();

        return back();
    }

    public function delete($id)
    {
        $comment= Comment::find($id);


        if(Gate::allows('delete-comment', $comment)){

            $comment->delete();

            return back()->with('info', 'An comment deleted');
        }


        return back()->with('info', 'Unauthorize to delete');;

    }
}

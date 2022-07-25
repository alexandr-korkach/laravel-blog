<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\CommentsRequest;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function create(CommentsRequest $request){


        $comment = Comment::create([
            'user_id' => Auth::user()->id,
            'body' => $request->message,
            'article_id' => $request->article_id
        ]);
        session()->flash('success', 'Коментар додано');
       return redirect()->back()->withFragment('#comments');
    }

    public function destroy(Comment $comment){

        if($comment && $comment->user == Auth::user()){

            $comment->delete();
            session()->flash('success', 'Коментар видалено');
            return redirect()->back()->withFragment('#comments');
        }
        else{
            abort(404);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\FrontUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    private $comment;
    private $comments;

    public function store(Request $request, $blog_id)
    {
        $validatedData = $request->validate([
            'text' => 'required|max:300',
        ]);

        $comment = new Comment();
        $comment->text = $validatedData['text'];
       

        $blog = Blog::findOrFail($blog_id);
        $blog->comments()->save($comment);
         

        return redirect()->back()->with('success', 'Comment created successfully.');
    }

      public function view($blog_id)
      {
        $this->comment = Comment::where('text', $blog_id)->orderBy("id", "desc")->get();
        return view("website.detail.detail", ["comments"=>$this->comment]);
      }

}

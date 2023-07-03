<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;


class BiztroxController extends Controller
{
    private $recentBlogs;
    private $blog;
    private $blogs;
    private $comment;
    private $categoris;
    private $comments;

    public function index()
    {
        $this->recentBlogs = Blog::where("status", 1)->orderBy("id", "desc")->take("6")->get();
        return view("website.home.home", ["recent_blogs" => $this->recentBlogs]);
    }

    public function category($id)
    {
        $this->blogs = Blog::where("category_id", $id )->where("status", 1)->orderBy("id", "desc")->simplePaginate(3);
        return view("website.category.category", ["blogs" => $this->blogs]);
    }

    public function detail($id)
    {
        $this->blog = Blog::find($id);
        return view("website.detail.detail", ["blog" => $this->blog]);
    }

    public function contuct()
    {
        return view("website.contuct.contuct");
    }

    public function newComment(Request $request, $id)
    {
        $this->comment = new Comment();
        $this->comment->blog_id = $id;
        $this->comment->front_user_id = Session::get('user_id');
        $this->comment->comment = $request->comment;


        $lastBlogComment = Comment::where('blog_id', $id)->orderBy('id', 'desc')->first();
        if ($lastBlogComment)
        {
            $commentCount = $lastBlogComment->comment_count + 1;
        }
        else
        {
            $commentCount = 1;
        }

        $this->comment->comment_count = $commentCount;
        $this->comment->save();
//        Comment::create([
//            'blog_id'   => $id,
//            'front_user_id'   => Session::get('user_id'),
//            'comment'   => $request->comment,
//            'comment_count' =>  1,
//        ]);
        return redirect('/blog-detail/'.$id)->with('message', 'Your comment post successfully.');
    }
} 

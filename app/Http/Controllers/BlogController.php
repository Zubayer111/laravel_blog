<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller 
{
    private $blog;
    private $blogs;
    private $categoris;
    private $message;

    public function index()
    {
        $this->categoris = Category::all();
        
        return view("admin.blog.add", ["categoris" => $this->categoris]);
    }

    public function create(Request $request)
    {
        Blog::newBlog($request);
        return redirect("/add-blog")->with("message", "Blog info created Successfully");
    }

    public function manage()
    {
        $this->blogs = Blog::orderBy("id", "desc")->get();
        return view("admin.blog.manage", ["blogs" => $this->blogs]);
    }

    public function detail($id)
    {
        $this->blog = Blog::find($id);
        return view("admin.blog.detail", ["blog" => $this->blog]);
    }

    public function updateStatus($id)
    {
        $this->blog = Blog::find($id);
        if ($this->blog->status == 1)
        {
            $this->blog->status = 0;
            $this->message = 'Blog status info unpublished successfully. ';
        }
        else
        {
            $this->blog->status = 1;
            $this->message = 'Blog status info published successfully. ';
        }
        $this->blog->save();
        return redirect('/manage-blog')->with('message', $this->message);
    }

    public function edit($id)
    {
        $this->blog = Blog::find($id);
        $this->categoris = Category::all();
        return view("admin.blog.edit", ["blog" => $this->blog, "categoris" => $this->categoris]);
    }

    public function update(Request $request, $id)
    {
        Blog::updatedBlog($request, $id);
        return redirect("/manage-blog")->with("message", "Blog info updated Successfully");
    }

    public function delete($id)
    {
        $this->blog = Blog::find($id);
        $this->categoris = Category::all();  
        if(file_exists($this->blog->image))
        {
            unlink($this->blog->image,);
        }
        $this->blog->delete();
        return redirect("/manage-blog")->with("message", "Blog info Delete Successfully");
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Blog extends Model
{
    use HasFactory;
    private static $blog;
    private static $image;
    private static $imageUrl;
    private static $imageName;
    private static $directory;

    public static function getImageurl($request)
    {
        self::$image = $request->file("image");
        self::$imageName = self::$image->getClientOriginalName();
        self::$directory = "blog-images/";
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory.self::$imageName;
        return self::$imageUrl;
    } 

    public static function newBlog($request)
    {
        self::$blog = new Blog();
        self::$imageUrl = self::getImageurl($request);
        self::saveBlogBasicInfo(self::$blog, $request, self::$imageUrl);
    }

    public function category()
    {
        return $this->belongsTo("App\Models\Category");
    }

    public function author()
    {
        return $this->belongsTo("App\Models\User", "author_id");
    }

    public static function updatedBlog($request, $id)
    {
        self::$blog = Blog::find($id);

        if($request->file('image'))
        {
            if(file_exists(self::$blog->image))
            {
                unlink(self::$blog->image);
            }
            self::$imageUrl = self::getImageurl($request);
        }
        else
        {
            self::$imageUrl = self::$blog->image;
        }

        self::saveBlogBasicInfo(self::$blog, $request, self::$imageUrl);
    }

    public static function saveBlogBasicInfo($blog, $request, $imageUrl)
    {
        $blog->category_id = $request->category_id;
        $blog->author_id = Auth::user()->id;
        $blog->main_title = $request->main_title;
        $blog->sub_title = $request->sub_title;
        $blog->short_description = $request->short_description;
        $blog->long_description = $request->long_description;
        $blog->image = $imageUrl;
        $blog->save();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}

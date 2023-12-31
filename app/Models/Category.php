<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public static $category;
    public static $image;
    public static $imageName;
    public static $imageUrl;
    public static $directory;

    public static function getImageUrl($request)
    {
        self::$image = $request->file("image");
        self::$imageName = self::$image->getClientOriginalName();
        self::$directory = "category-images/";
        self::$image->move(self::$directory, self::$imageName);
        return self::$directory.self::$imageName;
    } 

    public static function newCategory($request)
    {
        self::$category = new Category();
        self::$category->name = $request->name;
        self::$category->description = $request->description;
        self::$category->image = self::getImageUrl($request);
        self::$category->save();
    }

    public static function updatedCategory($request, $id)
    {
        self::$category = Category::find($id);
        if($request->file("image"))
        {
            if(file_exists(self::$category->image))
            {
                unlink(self::$category->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$category->image;
        }
        self::saveBasicInfo(self::$category, $request, self::$imageUrl);
    }
    public static function saveBasicInfo($category, $request, $imageUrl)
    {
        $category->name = $request->name;
        $category->description = $request->description;
        $category->image = $imageUrl;
        $category->save();
    }
    public static function deleteCategory($category, $request, $imageUrl)
    {
        $category->name = $request->name;
        $category->description = $request->description;
        $category->image = $imageUrl;
        $category->delete();
    }
}

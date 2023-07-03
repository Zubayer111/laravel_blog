<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;

use function PHPUnit\Framework\fileExists;

class CategoryController extends Controller
{
    private $category;
    private $categories;
     
    
    public function index()
    {
        return view("admin.category.add");
    }

    public function create(Request $request)
    {
        Category::newCategory($request);
        return redirect("/manage-category")->with("message", "Category info created Successfully");
    }

    public function manage()
    {
        $this->categories = Category::orderBy("id", "desc")->get();
        return view("admin.category.manage", ["categories" => $this->categories]);
    }

    public function edit($id)
    {
        $this->category = Category::find($id);
        return view("admin.category.edit", ["category" => $this->category]);
    }

   public function update(Request $request, $id)
   {
        Category::updatedCategory($request, $id);
        return redirect("/manage-category")->with("message", "Category Update info Successfully"); 
   }

   public function delete($id)
   {
    $this->category = Category::find($id);
    if(fileExists($this->category->image))
    {
        unlink($this->category->image);
    }
    $this->category->delete();
    return redirect("/manage-category")->with("message", "Category Delete info Successfully"); 
   }


}

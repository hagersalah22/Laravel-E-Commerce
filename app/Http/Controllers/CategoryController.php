<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
class CategoryController extends Controller
{
    function __construct(){
        $this->middleware('auth')->only(['store','update','destroy']);
    }

    public function index()
    {
        $categories= Category::all();
        return view('categories.index',['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
 

    /**
     * Store a newly created resource in storage.
     */
    public function create()
    {
        return view('categories.create');
    }
    public function store(Request $request)
    {       
    //       $request->validate([
    //         "name"=>"required|min:2",
    //         'image' => 'required|image',
    //       ]);
    //       //use create function

    //       Category::create(['name'=>$request->get('name'),'image'=>$request->file('image')->store('images')]);
    //       return to_route('categories.index');
    // // }

     $request_data = $request->all();
     //category_uploads
     if ($request->hasFile("image")) {
        $image = $request->file("image");
        $path = $image->store("category_uploads", "category_uploads"); 
        $request_data["image"] = $path;
    }
    Category::create($request_data);

    return to_route("categories.index");
    
}
    public function show(Category $category)
    {
        return view('categories.show', ['category'=>$category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        
        return view('categories.edit', ['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
   
        $allowed = Gate::inspect('update', $category);

        if ($allowed->allowed()){
            $category->update($request->all());
            return to_route('categories.show', $category->id);
        }

        return  abort(403);

    
    }

  
  
    


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return to_route('categories.index');
    }
}

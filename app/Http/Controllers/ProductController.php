<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class ProductController extends Controller
{
    // restrict deleting,updating to only admins or creators
     function __construct(){
     $this->middleware('amazon')->only(['store']);

    //     //        $this->middleware('auth')->expect['show','index']);
     }
     
   

    function  index(){
      
        $products = Product::paginate(5);  
      
        return view('products.index', ['products'=>$products]);
    }

    function  index_db(){

        $products=  DB::table('$products')->get();
      
        return view('products.index', ['$products'=>$products]);
    }

    function store()
    {
    
        # validate data in backend
    
          \request()->validate([
    
            "name"=>"required|min:5",
            "image"=>"required"
        ],[
            "name.required"=>"product name is required",
         
        ]);

    
      $requestdata = \request()->all();
       $requestdata['user_id']=Auth::id();
     
      $product=Product::create($requestdata);
    
        return to_route('products.show', $product->id);
    

     }
     function  create(){
    
        $category=Category::all();
        return view('products.create',["category" =>$category]);
    }
    function show($id){
        $product = Product::findorfail($id);
        return view('products.show', ["product"=>$product]);
    }
  
  
    function destroy($id){

        // if (! Gate::allows('is-admin')) {
        //     abort(403);
        // }
        $user= Auth::user();
        $product =Product::findorfail($id);
        $response = Gate::inspect('destroy', $product);
                if($response->allowed()||Gate::allows('is-admin') ){

                    $product->delete();
        return to_route('products.index');
    } 
    return  abort(403);
}
 
    

// function store(){
//     $data =\request();
//     $name=\request()->get('name');
//     $price=\request()->get('price');
//    $image=\request()->get('image');
//     $description=\request()->get('description');

//     $product= new Product();
//     $product->name=$name;
//     $product->image=$image;
//     $product->price=$price;
//     $product->description=$description;
//     $product->save();

//     return to_route('products.index');


// }




 function edit($id)
    {
        $product = Product::findOrfail($id);
        $response = Gate::inspect('update', $product);
        if($response->allowed()||Gate::allows('is-admin') ){

        return view('products.edit', ['product' => $product]);
    } 
    return  abort(403);
}
// using Auth polices
 function update(Request $request, $id)
    {
        $data =\request();
        $name=\request()->get('name');
        $price=\request()->get('price');
       $image=\request()->get('image');
        $description=\request()->get('description');
        $user= Auth::user();
        $product =Product::findorfail($id);
        // $response = Gate::inspect('update', $product);
        //         if($response->allowed()) {
                 $product->name=$name;
         $product->price=$price;
          $product->description=$description;
         $product->save();

        return to_route('products.index', $product->id);
     {
    // return  abort(403);
}
    }
}
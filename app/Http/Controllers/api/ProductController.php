<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Http\Resources;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::all();
        return $products;

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'name' => ['required'],
           
            // Add more validation rules for other data keys
        ]);
        
        if ($validator->fails()) {
            // Handle the validation errors, e.g., return a response with error messages
            return response()->json(['errors' => $validator->errors()], 422);
        }
       
        $product = Product::create($request->all());

        return $product;
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return $product;
    

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //

        $validator=Validator::make($request->all(),[
            "name"=>"unique:products",
         ],[
            "name.unique"=>"name must be unique"
         ]);
       
         if($validator->fails()){
            $errors=$validator->errors()->all();
            return response()->json(['errors' => $errors], 422);
         }
    
    
          $product->update($request->all());
          return response($product,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //

        $product->delete();
        return 'deleted';
    }
}

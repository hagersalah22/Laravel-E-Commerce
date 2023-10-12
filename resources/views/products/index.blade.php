@extends('layouts.app')
@section('content')
<div class="container">
<a href="{{route('products.create')}}" class="btn btn-success mx-2">Add Product </a> 
    <div class="row">
        @foreach ($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card">
               <img src="{{asset('images/'.$product->image)}}" width="200" height="200" class="card-img-top" alt="{{ $product['name'] }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">${{$product->price}}</p>
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">Show</a>
               
                    <a href="{{ route('products.edit', $product->id)}}" class="btn btn-primary">Edit</a>
               
                   <a href="{{ route('products.destroy', $product->id)}}" class="btn btn-danger"  onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
                  
                </div>
            </div>
        </div>
     
        @endforeach

    </div>
          <div class="mt-4">
        {{ $products->links() }}
    </div>
</div>
@endsection
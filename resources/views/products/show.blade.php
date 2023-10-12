@extends('layouts.app')
@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                @if($product->category)
                <h3> Category : <a href="{{route('categories.show' , $product->category->id)}}"> {{$product->category->name}} </a> </h3>
            @else
            <h3> Category: </h3>
            @endif
            <img src="{{ asset('images/' . $product->image) }}" class="card-img-top">

                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ $product->price}}</p>
                    <p class="card-text">{{ $product->description }}</p>
                    <p class="card-text">{{ $product->created_at}}</p>
                    <p class="card-text">{{ $product->updated_at }}</p>
        
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


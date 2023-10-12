@extends('layouts.app')
@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <h3>Products in this category:</h3>

                @if ($category->products->isEmpty())
                    <p>No products found in this category.</p>
                @else
                    <ul>
                        @foreach ($category->products as $product)
                            <li>{{ $product->name }}</li>
                        @endforeach
                    </ul>
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $category->name }}</h5>
                    <a href="{{ route('categories.index') }}" class="btn btn-primary">Back to all categories</a>
                </div>
            </div>
        </div>
    </div>

@endsection

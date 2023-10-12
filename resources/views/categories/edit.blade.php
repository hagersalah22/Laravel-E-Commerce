@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Category</h1>

        <form method="post" action="{{ route('categories.update', $category->id) }}" enctype="multipart/form-data" >
            @csrf
            @method('put')

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') ?? $category->name }}">
                @error('name')
                    <div style="color: red; font-weight: bold">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control"  value="{{ old('image') }}" >
                @if ($category->image)
                    <img src="{{ asset('category_img/' .$category->image) }}"  alt="Category Image" style="max-width: 200px;">
                @endif
                @error('image')
                    <div style="color: red; font-weight: bold">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

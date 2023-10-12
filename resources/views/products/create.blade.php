@extends('layouts.app')
@section('content')
    <h1> Create New Product</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form method="post" action="{{route('products.index')}}" >
        @csrf
        <div class="mb-3">
      <label class="form-label">Category </label>
      <select class="form-select"  name='category_id' aria-label="Default select example">
          <option selected disabled value="">Open this select menu</option>
          @foreach($category as $category)
          <option value="{{$category->id}}">{{$category->name}}</option>
          @endforeach
         
      </select>
        <div class="mb-3">
            <label  class="form-label">Name</label>
            <input type="text" class="form-control" name="name"  value="{{ old('name') }}" >
        </div>
       <div>
       @error('name')
    <div style="color:red; font-weight:bold">{{ $message }}</div>
@enderror
       </div>
        <div class="mb-3">
            <label  class="form-label">Price</label>
            <input type="number" name="price" class="form-control"  value="{{ old('price') }} "  >
        </div>
        <div class="mb-3">
            <label >Description</label>
            <textarea class="form-control"  name="description" ></textarea>
            
        </div>

        <div class="mb-3">
            <label  class="form-label">Image</label>
            <input type="text" name="image" class="form-control"  value="{{ old('image') }}" >
        </div>
        <div>
       @error('name')
    <div style="color:red; font-weight:bold">{{ $message }}</div>
@enderror
       </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
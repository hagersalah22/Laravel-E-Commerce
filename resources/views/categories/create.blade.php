@extends('layouts.app')
@section('content')
    <h1> Create New Category</h1>
  

    <form method="post" action="{{route('categories.store')}}" enctype="multipart/form-data">
         @csrf
  
    </div>
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
            <label  class="form-label">Image</label>
            <input type="file" name="image" class="form-control"  value="{{ old('image') }}" >
        </div>
        <div>
       @error('name')
    <div style="color:red; font-weight:bold">{{ $message }}</div>
@enderror
       </div>

        <button type="submit" class="btn btn-success">Submit</button>
    </form>

@endsection
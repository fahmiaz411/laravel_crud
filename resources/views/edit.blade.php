@extends('template.container')

@section('style')
    <link rel="stylesheet" href="{{asset('style/style.css')}}">
@endsection

@section('content')
<div class="container mt-5" style="width: 33%;">
  {{-- @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
  @endif --}}
  <form class="mb-4" action="/update/{{$product->id}}" method="POST">
      @csrf
      @method('PATCH')
      <h1 class="text-center mb-4">Edit Product</h1>
       <div class="form-group">
          <label for="">Product Name</label>
      <input value="{{$product->product_name}}" type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name">
      @error('product_name') <span class="text-danger">{{$message}}</span> @enderror
      </div>
      <div class="form-group">
        <label for="">Product Category</label>
        <select name="category_id" class="form-control">
          @foreach ($categories as $category)
              <option value="{{$category->id}}">{{$category->name}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
          <label for="">Price</label>
      <input value="{{$product->price}}" type="number" class="form-control @error('price') is-invalid @enderror" name="price">
      @error('price') <span class="text-danger">{{$message}}</span> @enderror
      </div>
      <div class="form-group">
          <label for="">Stock</label>
      <input value="{{$product->stock}}" type="number" class="form-control @error('stock') is-invalid @enderror" name="stock">
      @error('stock') <span class="text-danger">{{$message}}</span> @enderror
      </div>
      <button type="submit" id="btn-submit" class="btn btn-primary mt-3">Submit</button>
  </form>
</div>
@endsection
@extends('admin.master')
@section('main-content')
<div class="main-content">
  <h2>Categories</h2>
  <div class="categories" style="text-align: center; justify-content: center;">
      <form action="{{route('admin_categories.store')}}" method="post">
        @csrf
        @if($categories->id)
            @method('put')
        @endif
        
      <label for="">Category Name: </label>
      <input type="text" name="category_name" placeholder="Category Name" style="width: 400px;" required value="{{$categories->category_name}}">
      <br><br>

      <label for="">Book Name: </label>
      <input type="text" name="book_name" placeholder="Book Name" style="width: 400px;" required value="{{$categories->book_name}}">
      <br><br>
      
      <label for="">Date: </label>
      <input type="date" name="date" placeholder="Date" style="width: 400px;"  value="{{$categories->date}}">
      <br><br>

      <button type="submit" style="width: 400px;">Save</button>
      <br><br>
    </form>
  </div>
</div>
@stop
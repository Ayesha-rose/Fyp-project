@extends('master')

@section('main-content')
<div class="col-md-10 main-content">
  <a href="{{route('categories.create')}}">Create_Category</a>
  <h2>Category List</h2>
  <table class="table table-bordered">
    <thead>
      <td>Book Name</td>
      <td>Category Name</td>
      <td>Date</td>
    </thead>
    <tbody>

      @foreach($categories as $category)
      <tr>
        <td>{{$category->book_name}}</td>
        <td>{{$category->category_name}}</td>
        <td>{{$category->date}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@stop
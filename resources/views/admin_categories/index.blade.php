@extends('admin.master')

@section('main-content')
<div class="col-md-10 main-content">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Category List</h2>
    <a class="btn btn-primary text-white px-4 pt-2" href="{{route('admin_categories.create')}}">Add New Categories</a>
  </div>

  <table class="table table-bordered">
    <thead>
      <td><b>Category Name</b></td>
      <td><b>Book Name</b></td>
      <td><b>Date</b></td>
    </thead>
    <tbody>

      @foreach($categories as $category)
      <tr>
        <td>{{$category->category_name}}</td>
        <td>{{$category->book_name}}</td>
        <td>{{$category->date}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@stop
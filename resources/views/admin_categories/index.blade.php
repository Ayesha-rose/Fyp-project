@extends('admin.master')

@section('adminpanel')
<div class="col-md-10 main-content">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Category List</h2>
    <a class="btn btn-primary text-white px-4 pt-2" href="{{ route('admin_categories.create') }}">Add New Categories</a>
  </div>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Category Name</th>
        <th>Book Name</th>
        <th>Date</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($categories as $category)
      <tr>
        <td>{{ $category->category_name }}</td>
        <td>{{ $category->book_name }}</td>
        <td>{{ $category->date }}</td>
        <td>
          <a href="{{ route('admin_categories.edit', $category->id) }}" class="btn btn-sm text-dark btn-outline-secondary">Edit</a>
          <form action="{{ route('admin_categories.destroy', $category->id) }}" method="post" style="display:inline;">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-sm btn-outline-secondary text-danger">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@stop

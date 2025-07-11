@extends('admin.master')

@section('adminpanel')
<div class="main-content">
  <div class="categories">
    <form action="{{ $category->id ? route('admin_categories.update', $category->id) : route('admin_categories.store') }}" method="post">
      @csrf
      @if($category->id)
      @method('put')
      @endif

      <div class="col-6">
        <div class="card text-center p-4 mb-4">
          <div class="card-body">
            <label style="align-items: baseline;">Category Name:</label>
            <input type="text" name="category_name" placeholder="Category Name" style="width: 400px;" required value="{{ $category->category_name ?? '' }}">
            <br><br>

            <label>Book Name:</label>
            <input type="text" name="book_name" placeholder="Book Name" style="width: 400px;" required value="{{ $category->book_name ?? '' }}">
            <br><br>

            <label>Date:</label>
            <input type="date" name="date" style="width: 400px;" value="{{ $category->date ?? '' }}">
            <br><br>

            <button type="submit" style="width: 400px;">Save</button>

          </div>
        </div>
      </div>


    </form>
  </div>
</div>
@stop
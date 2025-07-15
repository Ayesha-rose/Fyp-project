@extends('admin.master')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/adminpanel.css') }}">
@endsection

@section('adminpanel')
<div class="col-md-10 main-content">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Category List</h2>
    <a class="btn btn-dark text-white px-4 pt-2" href="{{ route('admin_categories.create') }}">Add New Categories</a>
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

          <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $category->id }}">
            Delete
          </button>

          <div class="modal fade" id="deleteModal{{ $category->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $category->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content p-3 rounded-4 shadow">


                <div class="modal-header border-0">
                  <h5 class="modal-title text-danger fw-bold" id="deleteModalLabel{{ $category->id }}">
                    <i class="fa-solid fa-triangle-exclamation me-2"></i> Confirm Deletion
                  </h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body text-center">
                  <p class="mb-3">Are you sure you want to delete <strong>{{ $category->book_name }}</strong>?</p>
                </div>


                <div class="modal-footer border-top-0 d-flex justify-content-between">
                  <button type="button" class="btn btn-light w-50 fw-bold me-2" data-bs-dismiss="modal">Cancel</button>

                  <form action="{{ route('admin_categories.destroy', $category->id) }}" method="POST" class="w-50">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger w-100 fw-bold">Yes, Delete</button>
                  </form>
                </div>

              </div>
            </div>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
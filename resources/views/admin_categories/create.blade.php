@extends('admin.master')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/adminpanel.css') }}">
@endsection

@section('adminpanel')
<div class="main-content">
  <div class="categories">


    <form action="{{ $category->id ? route('admin_categories.update', $category->id) : route('admin_categories.store') }}" method="post">
      @csrf
      @if($category->id)
      @method('put')
      @endif

      <div class="col-md-6 mx-auto">
        <div class="card p-4 shadow-sm">
          <div class="card-body">

            <h5 class="card-title mb-4 d-flex align-items-center">
              <i class="fa-solid fa-book me-2"></i> {{ $category->id ? 'Edit Book' : 'Add Book' }}
            </h5>

            <div class="mb-3">
              <label class="form-label">Category Name</label>
              <input type="text" name="category_name" class="form-control rounded-pill" placeholder="Category Name" required value="{{ $category->category_name ?? '' }}">
            </div>

            <div class="mb-3">
              <label class="form-label">Book Name</label>
              <input type="text" name="book_name" class="form-control rounded-pill" placeholder="Book Name" required value="{{ $category->book_name ?? '' }}">
            </div>

            <div class="mb-4">
              <label class="form-label">Date</label>
              <input type="date" name="date" class="form-control rounded-pill" value="{{ $category->date ?? '' }}">
            </div>

            <button type="submit" class="btn btn-dark w-100 fw-bold">
              {{ $category->id ? 'Update' : 'Save' }}
            </button>

          </div>
        </div>
      </div>
    </form>



    @if($category->id)
    <div class="col-md-6 mx-auto text-center mt-3">

      <button type="button" class="btn btn-danger fw-bold px-4" data-bs-toggle="modal" data-bs-target="#deleteModal">
        Delete
      </button>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3 rounded-4">

          <div class="modal-header border-0">
            <h5 class="modal-title text-danger fw-bold" id="deleteModalLabel">
              <i class="fa-solid fa-triangle-exclamation me-2"></i> Confirm Deletion
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body text-center">
            <p class="mb-3">Are you sure you want to delete this category?</p>
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
    @endif

  </div>
</div>
@stop
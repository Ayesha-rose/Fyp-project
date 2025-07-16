@extends('admin.master')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/adminpanel.css') }}">
@endsection

@section('adminpanel')
<div class="col-md-10 main-content">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Books List</h2>

    <!-- Add Category Button -->
    <a href="" class="btn text-white px-4 pt-2" style="background-color: #015F9E;" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
      Add Book
    </a>
  </div>

  <!-- Category Table -->
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Category_id</th>
        <th>Title</th>
        <th>Author</th>
        <th>Pdf_Path</th>
        <th>Description</th>
        <th>Image</th>
      </tr>
    </thead>
    <tbody>
      @foreach($books as $book)
      <tr>
        <td>{{ $book->category_id }}</td>
        <td>{{ $book->title }}</td>
        <td>{{ $book->author }}</td>
        <td>{{ $book->pdf_path }}</td>
        <td>{{ $book->description }}</td>
        <td>{{ $book->image }}</td>
        <td>
          <!-- Edit Button -->
          <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#editModal{{ $category->id }}">
            Edit
          </button>

          <!-- Delete Button -->
          <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $category->id }}">
            Delete
          </button>
        </td>
      </tr>
      <!-- Delete Modal -->
      <!-- <div class="modal fade" id="deleteModal{{ $category->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $category->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content p-3 rounded-4 shadow">
            <div class="modal-header border-0">
              <h5 class="modal-title text-danger fw-bold" id="deleteModalLabel{{ $category->id }}">
                <i class="fa-solid fa-triangle-exclamation me-2"></i> Confirm Deletion
              </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
              <p class="mb-3">Are you sure you want to delete <strong>{{ $category->category_name }}</strong>?</p>
            </div>
            <div class="modal-footer border-top-0 d-flex justify-content-between">
              <form action="{{ route('admin_categories.destroy', $category->id) }}" method="POST" class="w-50">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger w-100 fw-bold">Yes, Delete</button>
              </form>
            </div>
          </div>
        </div>
      </div> -->

      @endforeach
    </tbody>
  </table>
</div>



@endsection
@extends('admin.master')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/adminpanel.css') }}">
@endsection

@section('adminpanel')
<div class="col-md-10 main-content">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Category List</h2>

    <!-- Add Category Button -->
    <button class="btn text-white px-4 pt-2" style="background-color: #015F9E;" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
      Add Category
    </button>
  </div>

  <!-- Category Table -->
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Category Name</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($categories as $category)
      <tr>
        <td>{{ $category->category_name }}</td>
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
      <!-- Add category -->
      <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content p-3 rounded-4 shadow">
            <div class="modal-header border-0">
              <h5 class="modal-title fw-bold" id="addCategoryModalLabel" style="color: #015F9E;">
                <i class="fa-solid fa-book me-2"></i> Add Category
              </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin_categories.store') }}" method="POST">
              @csrf
              <div class="modal-body">
                <div class="mb-3">
                  <label class="form-label">Category Name</label>
                  <input type="text" name="category_name" class="form-control rounded-pill" required>
                </div>
              </div>
              <div class="modal-footer border-top-0 d-flex justify-content-between">
                <button type="submit" class="btn text-white w-50 fw-bold" style="background-color: #015F9E;">Add</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Edit Modal -->
      <div class="modal fade" id="editModal{{ $category->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $category->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content p-3 rounded-4 shadow">
            <div class="modal-header border-0">
              <h5 class="modal-title fw-bold" id="editModalLabel{{ $category->id }}" style="color: #015F9E;">
                <i class="fa-solid fa-book me-2"></i> Edit Category
              </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('admin_categories.update', $category->id) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="modal-body">
                <div class="mb-3">
                  <label class="form-label">Category Name</label>
                  <input type="text" name="category_name" class="form-control rounded-pill" value="{{ $category->category_name }}" required>
                </div>
              </div>
              <div class="modal-footer border-top-0 d-flex justify-content-between">
                <button type="submit" class="btn text-white w-50 fw-bold" style="background-color: #015F9E;">Update</button>
              </div>
            </form>

          </div>
        </div>
      </div>

      <!-- Delete Modal -->
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
      </div>

      @endforeach
    </tbody>
  </table>
</div>



@endsection
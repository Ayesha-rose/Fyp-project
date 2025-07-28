  @extends('admin.master')

  @section('styles')
  <link rel="stylesheet" href="{{ asset('css/adminpanel.css') }}">
  @endsection

  @section('adminpanel')
  <div class="col-md-12 main-content">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h2>Books List</h2>

      <!-- Add Book Button -->
      <a href="{{ route ('manage_books.create')}}" class="btn text-white px-4 pt-2" style="background-color: #015F9E;">
        Add Book
      </a>
    </div>

    <!-- Book Table -->
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Category name</th>
          <th>Title</th>
          <th>Author</th>
          <th>Pdf Link</th>
          <th>Description</th>
          <th>Image</th>
          <td>Actions</td>
        </tr>
      </thead>
      <tbody>
        @foreach($books as $book)
        <tr>
          <td>{{ $book->category->category_name }}</td>
          <td>{{ $book->title }}</td>
          <td>{{ $book->author }}</td>
          <td> <a href="{{ asset('storage/' . $book->pdf_link) }}" target="_blank">View PDF</a></td>
          <td>{{ $book->description }}</td>
          <td> <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}" width="100"></td>
          <td>
            <!-- Edit Button -->
            <a class="btn btn-sm btn-outline-secondary"
              href="{{ route('manage_books.edit', $book->id) }}">
              Edit
            </a>

            <!-- Delete Button -->
            <button type="button"
              class="btn btn-sm btn-outline-danger"
              data-bs-toggle="modal"
              data-bs-target="#deleteModal{{ $book->id }}">
              Delete
            </button>
          </td>
        </tr>
        <!-- Delete Modal -->
        <div class="modal fade" id="deleteModal{{ $book->id }}" tabindex="-1"
          aria-labelledby="deleteModalLabel{{ $book->id }}" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3 rounded-4 shadow">
              <div class="modal-header border-0">
                <h5 class="modal-title text-danger fw-bold"
                  id="deleteModalLabel{{ $book->id }}">
                  <i class="fa-solid fa-triangle-exclamation me-2"></i>
                  Confirm Deletion
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                  aria-label="Close"></button>
              </div>

              <div class="modal-body text-center">
                <p class="mb-3">
                  Are you sure you want to delete
                  <strong>{{ $book->title }}</strong>?
                </p>
              </div>

              <div class="modal-footer border-top-0 d-flex justify-content-between">
                <form action="{{ route('manage_books.destroy', $book->id) }}"
                  method="POST" class="w-50">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger w-100 fw-bold">
                    Yes, Delete
                  </button>
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
@extends('admin.master')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/adminpanel.css') }}">
@endsection

@section('adminpanel')
<div class="row">
  <div class="col-12">
    <div class="card text-center p-4 mb-4">
      <div class="card-body">
        <div class="card-icon"><i class="fas fa-user"></i></div>
        <h5>Total Users</h5>
        <h2>{{ $totalUsers }}</h2>
      </div>
    </div>
  </div>

  <div class="col-6">
    <div class="card text-center p-4 mb-4">
      <div class="card-body">
        <div class="card-icon"><i class="fas fa-book"></i></div>
        <h5>Books Uploaded</h5>
        <h2>{{ $totalBooks }}</h2>
      </div>
    </div>
  </div>

  <div class="col-6">
    <div class="card text-center p-4 mb-4">
      <div class="card-body">
        <div class="card-icon"><i class="fas fa-star"></i></div>
        <h5>Overall Rating</h5>
        <h2>{{ number_format($averageRating, 1) }}</h2> {{-- e.g. 4.3 --}}
      </div>
    </div>
  </div>

</div>
@stop
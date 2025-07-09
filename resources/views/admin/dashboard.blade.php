@extends('admin.master')

@section('adminpanel')
<div class="row">
  <div class="col-12">
    <div class="card text-center p-4 mb-4">
      <div class="card-body">
        <div class="card-icon"><i class="fas fa-user"></i></div>
        <h5>Total Users</h5>
        <h2>120</h2>
      </div>
    </div>
  </div>

  <div class="col-6">
    <div class="card text-center p-4 mb-4">
      <div class="card-body">
        <div class="card-icon"><i class="fas fa-book"></i></div>
        <h5>Books Uploaded</h5>
        <h2>85</h2>
      </div>
    </div>
  </div>

  <div class="col-6">
    <div class="card text-center p-4 mb-4">
      <div class="card-body">
        <div class="card-icon"><i class="fas fa-comment-dots"></i></div>
        <h5>Pending Feedback</h5>
        <h2>7</h2>
      </div>
    </div>
  </div>
</div>
@stop

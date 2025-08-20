@extends('master') {{-- Or your main layout --}}

@section('styles')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('userpanel')
<div class="container-fluid">
    <div class="row" style="height: 100vh;">

        <div class="col-md-9" style="height:100%; padding:0;">
            <iframe src="{{ $pdfUrl }}" width="100%" height="100%" style="border:none;"></iframe>
        </div>

        <div class="col-md-3 d-flex flex-column justify-content-center align-items-center bg-light">
            <h4 class="mb-3">Add Your Notes</h4>
            <form method="POST" action="">
                @csrf
                <div class="mb-3 w-100">
                    <textarea name="notes" class="form-control" rows="12" placeholder="Write your notes here..."></textarea>
                </div>
                <div class="mb-3 w-100">
                    <button type="submit" class="btn btn-primary w-100">Save Notes</button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
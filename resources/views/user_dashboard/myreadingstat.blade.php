@extends('user_dashboard.usersidebar')

@section('userpanelcontent')
<div class="main-content mt-4">
    <div class="feed">
        <h2 class="fw-bold">My Reading Stat</h2>
        <div class="d-flex align-items-center justify-content-between">
            <h4 class="p-2 fw-bold">January</h4>
            <select class="form-select w-auto list">
                <option>Month</option>
                <option>Week</option>
                <option>Day</option>
            </select>
        </div>
        <img src="images/ChartMotion.png" class="mt-5 img px-5 w-100">
    </div>
</div>
</div>
</div>

@endsection
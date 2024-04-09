@extends('Dashboard.layouts.master')

@section('title')
 My Profile
@endsection


@section('styles')
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    .container {
        max-width: 800px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }

    .profile-info {
        border-bottom: 1px solid #ccc;
        padding-bottom: 20px;
        margin-bottom: 20px;
    }

    .profile-info h2 {
        margin-bottom: 10px;
        color: #333;
    }

    .profile-info p {
        margin: 0;
        color: #666;
    }

    .btn {
        display: inline-block;
        padding: 8px 20px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
    }

    .btn:hover {
        background-color: #0056b3;
    }

</style>
@stop


@section('page_name')

@endsection


@section('content')
<div class="container">
    <h1>Admin Profile</h1>
    <div class="profile-info">
        <h2>Personal Information</h2>
        <p>Name: {{ auth()->guard('admin')->user()->name }}</p>
        <p>Email: {{ auth()->guard('admin')->user()->email }}</p>
        <p>Role: Admin</p>
    </div>
    <div class="profile-info">
        <h2>Contact Information</h2>
        <p>Phone: 123-456-7890</p>
        <p>Address: 123 Main St, City, Country</p>
    </div>
    <a href="{{ route('editProfile') }}" class="btn">Edit Profile</a>
</div>
@endsection


@section('')

@endsection


@section('scripts')

@stop


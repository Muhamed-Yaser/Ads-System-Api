@extends('Dashboard.layouts.master')

@section('title')
    Edit Profile
@endsection


@section('styles')

@stop


@section('content')
    <div class="container">
        <h1>Edit Profile</h1>
        <form action="{{ route('updateProfile') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ $admin->name }}">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ $admin->email }}">
            </div>
            <button type="submit">Update Profile</button>

        </form>
    </div>
@endsection


@section('')

@endsection


@section('scripts')

@stop

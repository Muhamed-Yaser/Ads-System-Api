@extends('Dashboard.layouts.master')

@section('title')
    Add City
@endsection


@section('styles')
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h1 {
            margin-bottom: 20px;
            margin: 20px;
        }

        .form-group {
            margin-bottom: 20px;
            margin: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            padding: 5px;
            width: 300px;
        }

        .submit-btn {
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            margin: 20px;
        }

        .error {
            color: red;
            font-size: 19px;
            padding: 10px;
        }
    </style>
@stop


@section('content')
    <h1>Add City</h1>
    <form action="{{ route('storeCity') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">City Name:</label>
            <input type="text" id="name" name="name">
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="submit-btn">Add City</button>
    </form>
@endsection

@section('scripts')

@stop

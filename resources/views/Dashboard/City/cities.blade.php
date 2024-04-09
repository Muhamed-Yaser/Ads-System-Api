@extends('Dashboard.layouts.master')

@section('title')
    City
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
            color: #09c;
            margin-left: 20px;
        }

        .city-list {
            list-style-type: none;
            padding: 0;
            margin-bottom: 20px;
            margin-top: 20px;
            margin-left: 20px;
        }

        .city-list li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .city-list li:last-child {
            border-bottom: none;
        }

        .city-list li button {
            padding: 5px 10px;
            margin-left: 10px;
            cursor: pointer;
        }

        .add-city-btn {
            padding: 10px;
            width: 11%;
            margin: 30px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .edit-delete-links a {
            text-decoration: none;
            color: #007bff;
            margin-left: 10px;
        }

        .edit-delete-links a:hover {
            text-decoration: underline;
        }
    </style>
@stop

@section('content')
    <h1>City Management</h1>
    <a href="{{ route('addCityPage') }}" class="add-city-btn">Add New City</a>
    @if ($cities->isEmpty())
        <p style="text-align: center; font-size: 25px;">No data found.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>City Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cities as $city)
                    <tr>
                        <td>{{ $city->id }}</td>
                        <td>{{ $city->name }}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('editCityPage', ['cityId' => $city->id]) }}">Edit</a>
                            <form action="{{ route('deleteCity', ['cityId' => $city->id]) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection



@section('')

@endsection


@section('scripts')

@stop

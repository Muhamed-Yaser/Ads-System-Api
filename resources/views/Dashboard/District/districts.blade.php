@extends('Dashboard.layouts.master')

@section('title')
    District
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

        .district-list {
            list-style-type: none;
            padding: 0;
            margin-bottom: 20px;
            margin-top: 20px;
            margin-left: 20px;
        }

        .district-list li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .district-list li:last-child {
            border-bottom: none;
        }

        .district-list li button {
            padding: 5px 10px;
            margin-left: 10px;
            cursor: pointer;
        }

        .add-district-btn {
            padding: 10px;
            margin: 30px;
            width: 14%;
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
    <h1>Districts Management</h1>
    <a href="{{ route('addDistrictPage') }}" class="add-district-btn">Add New District</a>
    @if ($districts->isEmpty())
        <p style="text-align: center; font-size: 25px;">No data found.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>District Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($districts as $district)
                    <tr>
                        <td>{{ $district->id }}</td>
                        <td>{{ $district->name }}</td>
                        <td>
                            <a class="btn btn-info"
                                href="{{ route('editDistrictPage', ['districtId' => $district->id]) }}">Edit</a>
                            <form action="{{ route('deleteDistrict', ['districtId' => $district->id]) }}" method="POST"
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

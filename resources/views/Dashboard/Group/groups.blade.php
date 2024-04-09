@extends('Dashboard.layouts.master')

@section('title')
    Governorates
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

        .governorate-list {
            list-style-type: none;
            padding: 0;
            margin-bottom: 20px;
            margin-top: 20px;
            margin-left: 20px;
        }

        .governorate-list li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .governorate-list li:last-child {
            border-bottom: none;
        }

        .governorate-list li button {
            padding: 5px 10px;
            margin-left: 10px;
            cursor: pointer;
        }

        .add-governorate-btn {
            padding: 10px;
            width: 17%;
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
    <h1>Governorate Management</h1>
    <a href="{{ route('addGroupPage') }}" class="add-governorate-btn">Add New Governorate</a>
    @if ($groups->isEmpty())
        <p style="text-align: center; font-size: 25px;">No data found.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Governorate Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($groups as $group)
                    <tr>
                        <td>{{ $group->id }}</td>
                        <td>{{ $group->name }}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('editGroupPage', ['groupId' => $group->id]) }}">Edit</a>
                            <form action="{{ route('deleteGroup', ['groupId' => $group->id]) }}" method="POST"
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

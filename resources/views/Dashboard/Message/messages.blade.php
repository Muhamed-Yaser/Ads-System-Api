@extends('Dashboard.layouts.master')

@section('title')
    Messages Page
@endsection


@section('styles')

@stop

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All Users Messages</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>phone</th>
                                <th>The Message</th>
                                <th>Reply with Gmail</th>
                                <th>delete</th>
                            </tr>
                        </thead>
                        <p></p>
                        <tbody>
                            @foreach ($messages as $message)
                                <tr>
                                    <td>{{ $message->name }}</td>
                                    <td>{{ $message->email }}</td>
                                    <td>{{ $message->phone }}</td>
                                    <td>{{ $message->message }}</td>
                                    <td> <a class="btn btn-success"
                                        href="https://www.google.com/intl/ar/gmail/about/" target="_blank">Reply</a></td>
                                    <td>
                                        <!-- Add delete button for each ad -->
                                        <form action="{{ route('destroyMessage', ['messageId' => $message->id]) }}"
                                            method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('scroll')
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
@endsection

@section('scripts')

@stop

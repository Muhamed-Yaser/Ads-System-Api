@extends('Dashboard.layouts.master')

@section('title')
    Home Page
@endsection


@section('styles')

@stop


@section('page_name')

@endsection


@section('content')
    {{-- main content --}}
    <!-- Page Wrapper -->


    <!-- Main Content -->
    <div id="content">



        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Tables Of All Ads</h1>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">DataTables for Add users Ads</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>email</th>
                                    <th>title</th>
                                    <th>description</th>
                                    <th>delete</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($ads as $ad)
                                    <tr>
                                        <td>{{ $ad->id }}</td>
                                        <td>{{$ad->user->email }}</td>
                                        <td>{{ $ad->title }}</td>
                                        <td>{{ $ad->text }}</td>
                                        <td>
                                            <!-- Add delete button for each ad -->
                                            <form action="{{ route('destroy', ['adId' => $ad->id]) }}" method="POST">
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
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->




@endsection



@section('scroll')
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
@endsection


@section('scripts')

@stop

@extends('layouts.header')

@section('content')

    <div class="container bootstrap snippet">
        <div class="row">
            <div class="header1">
                <a href="#" class="btn btn-primary btn btn-sm btn-outline-secondary">
                    <span class="glyphicon glyphicon-user"></span>
                </a>
                {{ auth()->user()->firstName .''. auth()->user()->lastName }}
                @if((auth()->user()->role == '1'))
                    <a href="addUser" class="btn btn-primary btn btn-sm btn-outline-secondary">
                        <span class="glyphicon glyphicon-plus"></span>AddUser</a>
                    <a href="dashboard" class="btn btn-primary btn btn-sm btn-outline-secondary">
                        <span class="glyphicon glyphicon-edit">Dashboard</a>
                @endif
                {{--{{dd($sessionUserData[0]->id)}}--}}
                <a href="edit/{{ auth()->user()->id }}" class="btn btn-primary btn btn-sm btn-outline-secondary">
                    <span class="glyphicon glyphicon-edit">Edit </a>
                <a href="logout" name="logout" class="btn btn-primary btn btn-sm btn-outline-secondary">
                    <span class="glyphicon glyphicon-log-out">LogOut</a>
            </div>
        </div>
    </div>

    <div class="container bootstrap snippet">
        <div class="row">
            <div class="col-md-12">
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        <strong>Success!</strong> {{ Session::get('message') }}
                    </div>
                    {{Session::forget('message') }}
                @endif
            </div>
        </div>
    </div>
    <div class="container bootstrap snippet">
        <div class="row">
            <div class="col-lg-12">

                <div class="main-box no-header clearfix">
                    <div class="main-box-body clearfix">
                        <div class="table-responsive">
                            <form method="post">
                                @csrf
                                <h1 align="center">AllUsers</h1>
                                <table id="example" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>FirstName</th>
                                        <th>LastName</th>
                                        <th>Email</th>
                                        <th>UserName</th>
                                        <th>Mobile Number</th>
                                        <th>Address</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        @if((auth()->user()->role == "1"))
                                            <th>Action</th>
                                        @endif
                                    </tr>
                                    </thead>

                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                $(".alert-success").fadeTo(3000, 500).slideUp(1000, function () {
                    $(".alert-success").slideUp(500);
                });
            </script>

            <script>
                $(function () {
                    $('#example').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: {
                            headers: {
                                'X-CSRF-Token': '{{ csrf_token() }}',
                            },
                            "url": "{{ url('/allUser/getAll') }}",
                            "type": "POST",
                            dataType: "json",
                        },
                        columns: [
                            {data: 'firstName'},
                            {data: 'lastName'},
                            {data: 'email'},
                            {data: 'userName'},
                            {data: 'contact_no'},
                            {data: 'address'},
                            {data: 'role'},
                            {data: 'status'},
                                @if((auth()->user()->role == "1"))
                            {
                                data: 'action', name: 'action', orderable: false, searchable: false
                            },
                            @endif
                        ]
                    });
                });
            </script>
            {{--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>--}}
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
@endsection

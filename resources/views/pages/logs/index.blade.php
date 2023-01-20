@extends('layouts.main', ['title' => 'Log Error', 'menu' => 'Log Error'])

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0">Log Error</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-12 connectedSortable">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Log error data master</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped datatable">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">ID</th>
                                        <th style="width: 5%">User</th>
                                        <th>Controller</th>
                                        <th>Function</th>
                                        <th>Error Line</th>
                                        <th>Error Message</th>
                                        <th>Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($logs as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->user->name }}</td>
                                            <td>{{ @$item->controller }}</td>
                                            <td>{{ @$item->function }}</td>
                                            <td>{{ @$item->error_line }}</td>
                                            <td>{{ @$item->error_message }}</td>
                                            <td>{{ @$item->created_at->diffForHumans() }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card -->
                </section>
                <!-- /.Left col -->
            </div>
            <!-- /.row (main row) -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('scripts')
    <script>
        $('.datatable').DataTable({});
    </script>
@endsection

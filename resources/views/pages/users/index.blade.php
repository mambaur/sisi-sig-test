@extends('layouts.main', ['title' => 'User', 'menu' => 'User'])

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0">User</h1>
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
                            <h3 class="card-title">User data master</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped datatable">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">ID</th>
                                        <th>Foto</th>
                                        <th>Email</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th style="width: 15%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td><img class="rounded-circle"
                                                    src="{{ @$item->photos[0]->foto ? asset('storage/' . @$item->photos[0]->foto) : 'https://cdn-icons-png.flaticon.com/512/4904/4904233.png' }}"
                                                    style="width: 35px; height: 35px; object-fit: cover"></td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->user_status }}</td>
                                            <td>
                                                <a href="{{ route('user-edit', [$item->id]) }}"
                                                    class="btn btn-outline-primary"><i class="fas fa-edit"></i></a>
                                                <a href="#" class="btn btn-outline-danger"
                                                    onclick="if (confirm('Apakah kamu yakin ingin menghapus {{ $item->name }}?')) {
                                                    event.preventDefault();
                                                    document.getElementById('delete-{{ $item->id }}').submit();
                                                  }else{
                                                    event.preventDefault();
                                                  }"><i
                                                        class="fas fa-trash"></i></a>

                                                <form id="delete-{{ $item->id }}"
                                                    action="{{ route('user-delete', $item->id) }}" style="display: none;"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <a href="{{ route('user-create') }}" class="btn btn-primary float-right"><i
                                    class="fas fa-plus"></i>
                                Tambah User</a>
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
    <!-- /.content-wrapper -->
@endsection

@section('scripts')
    <script>
        $('.datatable').DataTable({});
    </script>
@endsection

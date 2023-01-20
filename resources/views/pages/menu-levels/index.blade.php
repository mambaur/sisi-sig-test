@extends('layouts.main', ['title' => 'Menu Level', 'menu' => 'Menu Level'])

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0">Menu Level</h1>
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
                            <h3 class="card-title">Menu level data master</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered table-striped datatable">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">ID</th>
                                        <th>Level</th>
                                        <th style="width: 15%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($menu_levels as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->level }}</td>
                                            <td>
                                                <button type="button" data-level="{{ $item->level }}"
                                                    data-url="{{ route('menu-level-update', [$item->id]) }}"
                                                    class="btn btn-outline-primary edit-modal" data-toggle="modal"
                                                    data-target="#editModal"><i class="fas fa-edit"></i></button>
                                                <a href="#" class="btn btn-outline-danger"
                                                    onclick="if (confirm('Apakah kamu yakin ingin menghapus {{ $item->level }}?')) {
                                                    event.preventDefault();
                                                    document.getElementById('delete-{{ $item->id }}').submit();
                                                  }else{
                                                    event.preventDefault();
                                                  }"><i
                                                        class="fas fa-trash"></i></a>

                                                <form id="delete-{{ $item->id }}"
                                                    action="{{ route('menu-level-delete', $item->id) }}"
                                                    style="display: none;" method="post">
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
                            <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                                data-target="#addModal"><i class="fas fa-plus"></i>
                                Tambah Level</button>
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

    <!-- Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('menu-level-post') }}" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Tambah Level</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Level</label>
                            <input type="text" name="level" id="level" class="form-control" required
                                value="{{ old('level') }}" placeholder="Masukkan Level">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="form-edit" method="post">
                @method('put')
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Level</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Level</label>
                            <input type="text" name="level" id="level-edit" class="form-control" required
                                placeholder="Masukkan Level">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('.datatable').DataTable({});

        $(document).on("click", ".edit-modal", function() {
            let level = $(this).data('level');
            let url = $(this).data('url');
            $("#level-edit").val(level);
            $("#form-edit").attr('action', url);
        });
    </script>
@endsection

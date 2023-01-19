@extends('layouts.main', ['title' => 'Tambah Menu', 'menu' => 'Menu'])

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0">Tambah Menu</h1>
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
                    <form action="{{ route('menu-post') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Tambah menu data master</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="menu_name">Nama Menu</label>
                                            <input type="text" name="menu_name" id="menu_name"
                                                class="form-control @error('menu_name') is-invalid @enderror"
                                                placeholder="Masukkan Nama Menu">
                                            @error('menu_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="id_level">Level</label>
                                            <select class="form-control @error('id_level') is-invalid @enderror"
                                                id="id_level" name="id_level">
                                                @foreach ($levels as $item)
                                                    <option value="{{ $item->id }}">{{ $item->level }}</option>
                                                @endforeach
                                            </select>
                                            @error('id_level')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="parent_id">Parents</label>
                                            <select class="form-control" id="parent_id" name="parent_id">
                                                <option value="">Pilih Parents</option>
                                                @foreach ($parents as $item)
                                                    <option value="{{ $item->id }}">{{ $item->menu_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="menu_link">Link Menu</label>
                                            <input type="text" name="menu_link" id="menu_link" class="form-control"
                                                placeholder="Masukkan Link Menu">
                                        </div>
                                        <div class="form-group">
                                            <label for="menu_icon">Menu icon</label>
                                            <input type="file" name="menu_icon" id="menu_icon" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <button type="submit" class="btn btn-primary float-right">
                                    Submit</button>
                            </div>
                        </div>
                        <!-- /.card -->
                    </form>
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

        $(document).on("click", ".edit-modal", function() {
            let level = $(this).data('level');
            let url = $(this).data('url');
            $("#level-edit").val(level);
            $("#form-edit").attr('action', url);
        });
    </script>
@endsection

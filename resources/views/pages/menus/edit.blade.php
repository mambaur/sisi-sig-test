@extends('layouts.main', ['title' => 'Edit Menu', 'menu' => 'Menu'])

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0">Edit Menu</h1>
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
                    <form action="{{ route('menu-update', [$menu->id]) }}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('put')
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Edit menu data master</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="menu_name">Nama Menu</label>
                                            <input type="text" name="menu_name" id="menu_name"
                                                class="form-control @error('menu_name') is-invalid @enderror"
                                                value="{{ old('menu_name') ?? $menu->menu_name }}"
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
                                                    <option value="{{ $item->id }}"
                                                        @if ($menu->id_level == $item->id) selected @endif>
                                                        {{ $item->level }}</option>
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
                                                    <option value="{{ $item->id }}"
                                                        @if ($menu->parent_id == $item->id) selected @endif>
                                                        {{ $item->menu_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="menu_link">Link Menu</label>
                                            <input type="text" name="menu_link"
                                                value="{{ old('menu_link') ?? $menu->menu_link }}" id="menu_link"
                                                class="form-control" placeholder="Masukkan Link Menu">
                                        </div>
                                        <div class="form-group">
                                            <label for="menu_icon">Ubah icon</label>
                                            <img class="d-block mb-2"
                                                src="{{ $menu->menu_icon ? asset('storage/' . $menu->menu_icon) : 'https://cdn-icons-png.flaticon.com/512/4904/4904233.png' }}"
                                                style="width: 50px; height: 50px; object-fit: cover">
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

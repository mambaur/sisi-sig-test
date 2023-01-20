@extends('layouts.main', ['title' => 'Tambah User', 'menu' => 'User'])

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0">Tambah User</h1>
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
                <section class="col-lg-6 col-12 col-md-6 connectedSortable">
                    <form action="{{ route('user-post') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Tambah user data master</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="name">Nama User</label>
                                            <input type="text" name="name" id="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                value="{{ old('name') }}">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" id="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                value="{{ old('email') }}">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" name="password" id="password"
                                                class="form-control @error('password') is-invalid @enderror">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="password_confirmation">Password Confirmation</label>
                                            <input type="password" name="password_confirmation" id="password_confirmation"
                                                class="form-control @error('password_confirmation') is-invalid @enderror">
                                            @error('password_confirmation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="no_hp">No HP</label>
                                            <input type="text" name="no_hp" id="no_hp" value="{{ old('no_hp') }}"
                                                class="form-control @error('no_hp') is-invalid @enderror">
                                            @error('no_hp')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="wa">WA</label>
                                            <input type="text" name="wa" id="wa" value="{{ old('wa') }}"
                                                class="form-control @error('wa') is-invalid @enderror">
                                            @error('wa')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="pin">Pin</label>
                                            <input type="text" name="pin" id="pin" value="{{ old('pin') }}"
                                                class="form-control @error('pin') is-invalid @enderror">
                                            @error('pin')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="status_user">Status</label>
                                            <select class="form-control @error('status_user') is-invalid @enderror"
                                                id="status_user" name="status_user">
                                                <option value="active">Aktif</option>
                                                <option value="inactive">Non Active</option>
                                            </select>
                                            @error('status_user')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="user_photo">Foto</label>
                                            <input type="file" name="user_photo" id="user_photo" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Akses Menu</label>
                                            @foreach ($menus as $item)
                                                <div class="form-check">
                                                    <input class="form-check-input" name="menus[]" type="checkbox"
                                                        id="menus_{{ $item->id }}" value="{{ $item->id }}">
                                                    <label class="form-check-label" for="menus_{{ $item->id }}">
                                                        {{ $item->menu_name }}
                                                    </label>
                                                </div>
                                            @endforeach
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
@endsection

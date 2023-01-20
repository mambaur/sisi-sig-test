@extends('layouts.main', ['title' => 'Edit User', 'menu' => 'Edit User'])

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0">Edit User</h1>
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
                <section class="col-lg-6 col-12 connectedSortable">
                    <form action="{{ route('user-update', [$user->id]) }}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('put')
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Edit user data master</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="name">Nama User</label>
                                            <input type="text" name="name" id="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                value="{{ old('name') ?? @$user->name }}">
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
                                                value="{{ old('email') ?? @$user->email }}">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="no_hp">No HP</label>
                                            <input type="text" name="no_hp" id="no_hp"
                                                value="{{ old('no_hp') ?? @$user->no_hp }}"
                                                class="form-control @error('no_hp') is-invalid @enderror">
                                            @error('no_hp')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="wa">WA</label>
                                            <input type="text" name="wa" id="wa"
                                                value="{{ old('wa') ?? @$user->wa }}"
                                                class="form-control @error('wa') is-invalid @enderror">
                                            @error('wa')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="pin">Pin</label>
                                            <input type="text" name="pin" id="pin"
                                                value="{{ old('pin') ?? @$user->pin }}"
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
                                                <option value="active" @if (@$user->status_user == 'active') selected @endif>
                                                    Aktif</option>
                                                <option value="inactive" @if (@$user->status_user == 'inactive') selected @endif>
                                                    Non Active</option>
                                            </select>
                                            @error('status_user')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="user_photo">Ubah Foto</label>
                                            <img class="d-block mb-2"
                                                src="{{ @$user->photos[0]->foto ? asset('storage/' . @$user->photos[0]->foto) : 'https://cdn-icons-png.flaticon.com/512/4904/4904233.png' }}"
                                                style="width: 50px; height: 50px; object-fit: cover">
                                            <input type="file" name="user_photo" id="user_photo" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Akses Menu</label>
                                            @foreach ($menus as $item)
                                                <div class="form-check">
                                                    <input class="form-check-input" name="menus[]" type="checkbox"
                                                        @if (in_array($item->id, $menu_id)) checked @endif
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
                <section class="col-lg-6 col-12 connectedSortable">
                    <form action="{{ route('user-change-password', [$user->id]) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Ubah Password</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="current_password">Password Lama</label>
                                            <input type="password" name="current_password" id="current_password"
                                                class="form-control @error('current_password') is-invalid @enderror">
                                            @error('current_password')
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
                                            <label for="password_confirmation">Konfirmasi Password</label>
                                            <input type="password" name="password_confirmation"
                                                id="password_confirmation"
                                                class="form-control @error('password_confirmation') is-invalid @enderror">
                                            @error('password_confirmation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
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

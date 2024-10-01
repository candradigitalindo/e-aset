@extends('layouts.dashboard')
@section('title')
    Edit Pengguna
@endsection
@section('content')
    <!-- BEGIN: Top Bar -->
    <div class="top-bar">
        <!-- BEGIN: Breadcrumb -->
        <div class="-intro-x breadcrumb me-auto d-none d-sm-flex"> <a href="{{ route('user.index') }}">Data Pengguna</a> <i
                data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="{{ route('user.edit', $user->id) }}"
                class="breadcrumb--active">Edit Pengguna</a> </div>
        <!-- END: Breadcrumb -->
        <!-- BEGIN: Search -->
        <div class="intro-x position-relative me-3 me-sm-6">


        </div>
        <!-- END: Search -->

    </div>

    <!-- END: Top Bar -->

    <div class="row gap-y-6 mt-5">
        <div class="intro-y col-12 col-lg-12">
            @include('flash-message')
            <div class="intro-y box">
                <div
                    class="d-flex flex-column flex-sm-row align-items-center p-5 border-bottom border-gray-200 dark-border-dark-5">
                    <h2 class="fw-medium fs-base me-auto">
                        Edit Pengguna
                    </h2>

                </div>
                <div id="input" class="p-5">
                    <div class="preview">
                        <form action="{{ route('user.update', $user->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div>
                                <label for="regular-form-1" class="form-label">Nama Pengguna</label>
                                <input id="regular-form-1" type="text" class="form-control" name="name"
                                    value="{{ $user->name }}">
                                <div class="text-theme-6 mt-2">{{ $errors->first('name') }}</div>
                            </div>
                            <div>
                                <label for="regular-form-1" class="form-label">Username</label>
                                <input id="regular-form-1" type="text" class="form-control" name="username"
                                    value="{{ $user->username }}">
                                <div class="text-theme-6 mt-2">{{ $errors->first('username') }}</div>
                            </div>
                            <div>
                                <label for="regular-form-1" class="form-label">Hak Akses</label>
                                <select data-placeholder="Pilih Hak Akses" class="tom-select w-full" name="role">
                                    <option value=""></option>
                                    <option value="superadmin" @if ($user->role == "superadmin") selected @endif>Superadmin</option>
                                    <option value="admin" @if ($user->role == "admin") selected @endif>Admin</option>
                                    <option value="Pengguna" @if ($user->role == "Pengguna") selected @endif>Pengguna</option>
                                </select>
                                <div class="text-theme-6 mt-2">{{ $errors->first('role') }}</div>
                            </div>
                            <div>
                                <label for="regular-form-1" class="form-label">Hak Ruangan</label>
                                <select data-placeholder="Select your favorite actors" class="tom-select w-full" multiple
                                    name="ruangan[]">

                                    @foreach ($ruangans as $ruangan)
                                        <option value="{{ $ruangan->id }}" {{ (in_array($ruangan->id, $data)) ? 'selected' : '' }}>[{{ $ruangan->kode_ruangan }}] {{ $ruangan->nama_ruangan }}</option>
                                    @endforeach
                                </select>
                                <div class="text-theme-6 mt-2">{{ $errors->first('ruangan') }}</div>
                                
                            </div>
                            <div>
                                <label for="regular-form-1" class="form-label">Password</label>
                                <input id="regular-form-1" type="text" class="form-control" name="password"
                                    value="{{ old('password') }}">
                                <div class="text-theme-6 mt-2">{{ $errors->first('password') }}</div>
                            </div>
                            <hr class="mt-3">

                            <button type="submit" class="btn btn-primary mt-5">Simpan</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

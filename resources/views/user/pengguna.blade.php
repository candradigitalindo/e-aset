@extends('layouts.dashboard')
@section('title')
    Pengguna
@endsection
@section('content')
    <!-- BEGIN: Top Bar -->
    <div class="top-bar">
        <!-- BEGIN: Breadcrumb -->
        <div class="-intro-x breadcrumb me-auto d-none d-sm-flex"> <a href="{{ route('home') }}">Dashboard</a> <i
                data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="{{ route('pengguna.index') }}"
                class="breadcrumb--active">Data Pengguna</a> </div>
        <!-- END: Breadcrumb -->
        <!-- BEGIN: Search -->
        <div class="intro-x position-relative me-3 me-sm-6">


        </div>
        <!-- END: Search -->

    </div>

    <!-- END: Top Bar -->
    <div class="g-col-12 mt-3">
        <div class="intro-y box mt-5">
            <div
                class="d-flex flex-column flex-sm-row align-items-center p-5 border-bottom border-gray-200 dark-border-dark-5">
                <h2 class="fw-medium fs-base me-auto">
                    Data Pengguna
                </h2>

            </div>
            <div id="bordered-table" class="p-5">
                <div class="preview">
                    <div class="overflow-x-auto">
                        <table class="table table-bordered" id="ruangan">
                            <thead>
                                <tr>
                                    <th class="text-nowrap">No</th>
                                    <th class="text-nowrap">Nama Pengguna</th>
                                    <th class="text-nowrap">Username</th>
                                    <th class="text-nowrap">Kode Ruangan</th>
                                    <th class="text-nowrap">Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($penggunas as $user)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->ruangan }}</td>
                                        <td>
                                            <form method="POST" action="{{ route('user.destroy', $user->id) }}">
                                                <a href="{{ route('user.show', $user->id) }}" class="btn btn-success w-33 me-2 mb-0"> <i data-feather="lock" class="w-4 h-4 me-2"></i>
                                                    Reset Password </a>
                                                {{-- <a href="{{ route('user.edit', $user->id) }}"
                                                    class="btn btn-warning me-1 mb-2 me-2"> <i data-feather="edit"
                                                        class="w-5 h-5"></i> </a> --}}
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger me-1 mb-2"> <i data-feather="trash"
                                                        class="w-5 h-5"></i> </button>
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
        <!-- END: Bordered Table -->
    </div>
    <div class="row gap-y-6 mt-5">
        <div class="intro-y col-12 col-lg-12">
            @include('flash-message')
            <div class="intro-y box">
                <div
                    class="d-flex flex-column flex-sm-row align-items-center p-5 border-bottom border-gray-200 dark-border-dark-5">
                    <h2 class="fw-medium fs-base me-auto">
                        Tambah Pengguna
                    </h2>

                </div>
                <div id="input" class="p-5">
                    <div class="preview">
                        <form action="{{ route('pengguna.store') }}" method="post">
                            @csrf

                            <div>
                                <label for="regular-form-1" class="form-label">Nama Pengguna</label>
                                <input id="regular-form-1" type="text" class="form-control" name="name"
                                    value="{{ old('name') }}">
                                <div class="text-theme-6 mt-2">{{ $errors->first('name') }}</div>
                            </div>
                            <div>
                                <label for="regular-form-1" class="form-label">Username</label>
                                <input id="regular-form-1" type="text" class="form-control" name="username"
                                    value="{{ old('username') }}">
                                <div class="text-theme-6 mt-2">{{ $errors->first('username') }}</div>
                            </div>
                            <div>
                                <label for="regular-form-1" class="form-label">Ruangan</label>
                                <select data-placeholder="Pilih Hak Akses" class="tom-select w-full" name="ruangan">
                                    <option value=""></option>
                                    @foreach ($ruangans as $ruangan)
                                        <option value="{{ $ruangan->kode_ruangan }}" @if ($ruangan->id == old('ruangan')) selected @endif>{{ $ruangan->nama_ruangan }}</option>
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

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#ruangan').DataTable();
        });
    </script>
@endsection

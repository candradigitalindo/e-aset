@extends('layouts.dashboard')
@section('title')
    Ubah Password
@endsection
@section('content')
    <!-- BEGIN: Top Bar -->
    <div class="top-bar">
        <!-- BEGIN: Breadcrumb -->
        <div class="-intro-x breadcrumb me-auto d-none d-sm-flex"> <a href="{{ route('home') }}">Dashboard</a> <i
                data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="{{ route('ubahpassword') }}"
                class="breadcrumb--active">Ubah Password</a> </div>
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
                        Ubah Password
                    </h2>

                </div>
                <div id="input" class="p-5">
                    <div class="preview">
                        <form action="{{ route('post.ubahpassword') }}" method="post">
                            @csrf
                        <div>
                            <label for="regular-form-1" class="form-label">Password Baru</label>
                            <input id="regular-form-1" type="text" class="form-control" placeholder="Minimal 8 karakter" name="password">
                            <div class="text-theme-6 mt-2">{{ $errors->first('password') }}</div>
                        </div>
                        <hr class="mt-3">
                        <a href="{{ route('home') }}" type="button" class="btn btn-secondary mt-5 me-5">Kembali</a>
                        <button type="submit" class="btn btn-primary mt-5">Simpan</button>
                    </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

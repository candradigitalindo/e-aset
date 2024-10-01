@extends('layouts.dashboard')
@section('title')
    Edit Ruangan
@endsection
@section('content')
    <!-- BEGIN: Top Bar -->
    <div class="top-bar">
        <!-- BEGIN: Breadcrumb -->
        <div class="-intro-x breadcrumb me-auto d-none d-sm-flex"> <a href="{{ route('ruangan.index') }}">Ruangan</a> <i
                data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="{{ route('ruangan.edit', $ruangan->id) }}"
                class="breadcrumb--active">Edit Ruangan</a> </div>
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
                        Edit Ruangan
                    </h2>

                </div>
                <div id="input" class="p-5">
                    <div class="preview">
                        <form action="{{ route('ruangan.update', $ruangan->id) }}" method="post">
                            @method('PUT')
                            @csrf
                            <div>
                                <label for="regular-form-1" class="form-label">Kode Ruangan</label>
                                <input id="regular-form-1" type="text" class="form-control" name="kode_ruangan" value="{{ $ruangan->kode_ruangan }}" disabled>
                                <div class="text-theme-6 mt-2">{{ $errors->first('kode_ruangan') }}</div>
                            </div>
                            <div>
                                <label for="regular-form-1" class="form-label">Nama Ruangan</label>
                                <input id="regular-form-1" type="text" class="form-control" name="nama_ruangan" value="{{ $ruangan->nama_ruangan }}">
                                <div class="text-theme-6 mt-2">{{ $errors->first('nama_ruangan') }}</div>
                            </div>
                            <div>
                                <label for="regular-form-1" class="form-label">Penanggung Jawab</label>
                                <input id="regular-form-1" type="text" class="form-control" name="penanggung_jawab" value="{{$ruangan->penanggung_jawab }}">
                                <div class="text-theme-6 mt-2">{{ $errors->first('penanggung_jawab') }}</div>
                            </div>
                            <div>
                                <label for="regular-form-1" class="form-label">NIP</label>
                                <input id="regular-form-1" type="text" class="form-control" name="nip" value="{{ $ruangan->nip }}">
                                <div class="text-theme-6 mt-2">{{ $errors->first('nip') }}</div>
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

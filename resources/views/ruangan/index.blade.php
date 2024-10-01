@extends('layouts.dashboard')
@section('title')
    Ruangan
@endsection
@section('content')
    <!-- BEGIN: Top Bar -->
    <div class="top-bar">
        <!-- BEGIN: Breadcrumb -->
        <div class="-intro-x breadcrumb me-auto d-none d-sm-flex"> <a href="{{ route('home') }}">Dashboard</a> <i
                data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="{{ route('ruangan.index') }}"
                class="breadcrumb--active">Ruangan</a> </div>
        <!-- END: Breadcrumb -->
        <!-- BEGIN: Search -->
        <div class="intro-x position-relative me-3 me-sm-6">


        </div>
        <!-- END: Search -->

    </div>

    <!-- END: Top Bar -->
    @if (auth()->user()->role == 'superadmin')
    <div class="row gap-y-6 mt-5">
        <div class="intro-y col-12 col-lg-12">
            @include('flash-message')
            <div class="intro-y box">
                <div
                    class="d-flex flex-column flex-sm-row align-items-center p-5 border-bottom border-gray-200 dark-border-dark-5">
                    <h2 class="fw-medium fs-base me-auto">
                        Tambah Ruangan
                    </h2>

                </div>
                <div id="input" class="p-5">
                    <div class="preview">
                        <form action="{{ route('ruangan.store') }}" method="post">
                            @csrf
                            <div>
                                <label for="regular-form-1" class="form-label">Kode Ruangan</label>
                                <input id="regular-form-1" type="text" class="form-control" name="kode_ruangan" value="{{ old('kode_ruangan') }}">
                                <div class="text-theme-6 mt-2">{{ $errors->first('kode_ruangan') }}</div>
                            </div>
                            <div>
                                <label for="regular-form-1" class="form-label">Nama Ruangan</label>
                                <input id="regular-form-1" type="text" class="form-control" name="nama_ruangan" value="{{ old('nama_ruangan') }}">
                                <div class="text-theme-6 mt-2">{{ $errors->first('nama_ruangan') }}</div>
                            </div>
                            <div>
                                <label for="regular-form-1" class="form-label">Penanggung Jawab</label>
                                <input id="regular-form-1" type="text" class="form-control" name="penanggung_jawab" value="{{ old('penanggung_jawab') }}">
                                <div class="text-theme-6 mt-2">{{ $errors->first('penanggung_jawab') }}</div>
                            </div>
                            <div>
                                <label for="regular-form-1" class="form-label">NIP</label>
                                <input id="regular-form-1" type="text" class="form-control" name="nip" value="{{ old('nip') }}">
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
    @endif
    <div class="g-col-12 mt-3">
        <div class="intro-y box mt-5">
            <div
                class="d-flex flex-column flex-sm-row align-items-center p-5 border-bottom border-gray-200 dark-border-dark-5">
                <h2 class="fw-medium fs-base me-auto">
                    Data Ruangan
                </h2>

            </div>
            <div id="bordered-table" class="p-5">
                <div class="preview">
                    <div class="overflow-x-auto">
                        <table class="table table-bordered" id="ruangan">
                            <thead>
                                <tr>
                                    <th class="text-nowrap">No</th>
                                    <th class="text-nowrap">Kode Ruangan</th>
                                    <th class="text-nowrap">Nama Ruangan</th>
                                    <th class="text-nowrap">Penanggung Jawab</th>
                                    <th class="text-nowrap">NIP</th>
                                    <th class="text-nowrap">Jumlah Barang</th>
                                    @if (auth()->user()->role == 'superadmin')
                                    <th class="text-nowrap">Aksi</th>
                                    @endif

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($ruangans as $ruangan)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $ruangan->kode_ruangan }}</td>
                                        <td>{{ $ruangan->nama_ruangan }}</td>
                                        <td>{{ $ruangan->penanggung_jawab }}</td>
                                        <td>{{ $ruangan->nip }}</td>
                                        <td>{{ formatPrice($ruangan->detailbarang->count()) }}</td>
                                        @if (auth()->user()->role == 'superadmin')
                                        <td>
                                            <form method="POST" action="{{ route('ruangan.destroy', $ruangan->id) }}">
                                            <a href="{{ route('ruangan.edit', $ruangan->id) }}"
                                                class="btn btn-warning me-1 mb-2 me-2"> <i data-feather="edit"
                                                    class="w-5 h-5"></i> </a>
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger me-1 mb-2"> <i data-feather="trash"
                                                        class="w-5 h-5"></i> </button>
                                            </form>
                                        </td>
                                        @endif
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

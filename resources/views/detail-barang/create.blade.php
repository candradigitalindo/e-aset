@extends('layouts.dashboard')
@section('title')
    Tambah Barang
@endsection
@section('content')
    <!-- BEGIN: Top Bar -->
    <div class="top-bar">
        <!-- BEGIN: Breadcrumb -->
        <div class="-intro-x breadcrumb me-auto d-none d-sm-flex"> <a href="{{ route('detailbarang.index') }}">Data Barang</a> <i
                data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="{{ route('detailbarang.create') }}"
                class="breadcrumb--active">Tambah Barang</a> </div>
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
                        Tambah Barang
                    </h2>

                </div>
                <div id="input" class="p-5">
                    <div class="preview">
                        <form action="{{ route('detailbarang.store') }}" method="post">
                            @csrf
                            <div>
                                <label for="regular-form-1" class="form-label">Kategori Barang</label>
                                <div class="mt-2">
                                    <select data-placeholder="Cari kategori barang" class="tom-select w-full" name="barang">
                                        <option value=""></option>
                                        @foreach ($barangs as $barang)
                                            <option value="{{ $barang->id }}" @if (old('barang') == $barang->id) selected @endif>[{{ $barang->kode_barang }}] - {{ $barang->nama_barang }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="text-theme-6 mt-2">{{ $errors->first('barang') }}</div>
                            </div>
                            <div>
                                <label for="regular-form-1" class="form-label">Ruangan</label>
                                <div class="mt-2">
                                    <select data-placeholder="Cari Ruangan" class="tom-select w-full" name="ruangan">
                                        <option value=""></option>
                                        @foreach ($ruangans as $ruangan)
                                            <option value="{{ $ruangan->id }}" @if (old('ruangan') == $ruangan->id) selected @endif>[{{ $ruangan->kode_ruangan }}] - {{ $ruangan->nama_ruangan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="text-theme-6 mt-2">{{ $errors->first('ruangan') }}</div>
                            </div>
                            <hr class="mt-2 mb-2">
                            <div class="preview">
                                <div class="grid columns-12 gap-2">
                                    <input type="text" class="form-control g-col-4" placeholder="Nomor Urut" aria-label="default input inline 1" name="nomor_urut" value="{{ old('nomor_urut') }}">

                                    <input type="text" class="form-control g-col-4" placeholder="Merek / Type" aria-label="default input inline 2" name="merek_type" value="{{ old('merek_type') }}">

                                    <input type="text" class="form-control g-col-4" placeholder="Tahun Perolehan" aria-label="default input inline 3" name="tahun_perolehan" value="{{ old('tahun_perolehan') }}">

                                </div>
                            </div>
                            <div class="preview">
                                <div class="grid columns-12 gap-2">
                                    <div class="text-theme-6 mt-2 g-col-4">{{ $errors->first('nomor_urut') }}</div>
                                    <div class="text-theme-6 mt-2 g-col-4">{{ $errors->first('merek_type') }}</div>
                                    <div class="text-theme-6 mt-2 g-col-4">{{ $errors->first('tahun_perolehan') }}</div>

                                </div>
                            </div>
                            <br>
                            <div class="preview">
                                <div class="grid columns-12 gap-2">
                                    <input type="text" class="form-control g-col-6" placeholder="Keterangan" aria-label="default input inline 1" name="keterangan" value="{{ old('keterangan') }}">

                                    <select data-placeholder="Status Barang" class="tom-select w-full g-col-6" name="status">
                                        <option value=""></option>
                                        <option value="Baik" @if (old('status') == "Baik") selected @endif>Baik</option>
                                        <option value="Rusak" @if (old('status') == "Rusak") selected @endif>Rusak</option>
                                        <option value="Retur" @if (old('status') == "Retur") selected @endif>Retur</option>
                                        <option value="Perbaiki" @if (old('status') == "Perbaiki") selected @endif>Perbaiki</option>
                                        <option value="Pinjam" @if (old('status') == "Pinjam") selected @endif>Pinjam</option>
                                    </select>

                                </div>
                            </div>
                            <div class="preview">
                                <div class="grid columns-12 gap-2">
                                    <div class="text-theme-6 mt-2 g-col-6">{{ $errors->first('keterangan') }}</div>
                                    <div class="text-theme-6 mt-2 g-col-6">{{ $errors->first('status') }}</div>

                                </div>
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

@extends('layouts.dashboard')
@section('title')
    Edit Maintenance
@endsection
@section('content')
    <!-- BEGIN: Top Bar -->
    <div class="top-bar">
        <!-- BEGIN: Breadcrumb -->
        <div class="-intro-x breadcrumb me-auto d-none d-sm-flex"> <a
                href="{{ route('detailbarang.show', $maintenance->detailbarang_id) }}">Data Barang</a>
            <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a
                href="{{ route('detailbarang-maintenance.edit', $maintenance->id) }}" class="breadcrumb--active">Edit
                Maintenance</a>
        </div>
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
                        Edit Maintenance Barang
                    </h2>

                </div>
                <div id="input" class="p-5">
                    <form action="{{ route('detailbarang-maintenance.update', $maintenance->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="grid columns-12 gap-x-5">
                            <div class="g-col-12 g-col-xl-12">
                                <input type="hidden" name="barang" value="{{ $maintenance->detailbarang_id }}">
                                <div>
                                    <label for="update-profile-form-6" class="form-label">Keterangan Maintenance</label>
                                    <textarea class="form-control" name="keterangan" id="" cols="10" rows="5">{{ $maintenance->keterangan }}</textarea>
                                    <div class="text-theme-6 mt-2">{{ $errors->first('keterangan') }}</div>
                                </div>
                            </div>
                            <div class="g-col-12 g-col-xl-6">
                                <div>
                                    <label for="update-profile-form-7" class="form-label">Tanggal Mulai Perbaikan</label>
                                    <input id="update-profile-form-7" type="date" class="form-control"
                                        name="tanggal_perbaikan" value="{{ $maintenance->tanggal_perbaikan }}">
                                    <div class="text-theme-6 mt-2">{{ $errors->first('tanggal_perbaikan') }}</div>
                                </div>
                            </div>
                            <div class="g-col-12 g-col-xl-6">
                                <div class="mt-3 mt-xl-0">
                                    <label for="update-profile-form-10" class="form-label">Tanggal Selesai Perbaikan</label>
                                    <input id="update-profile-form-10" type="date" class="form-control"
                                        name="tanggal_selesai" value="{{ $maintenance->tanggal_selesai }}">
                                    <div class="text-theme-6 mt-2">{{ $errors->first('tanggal_selesai') }}</div>
                                </div>
                            </div>
                            <div class="g-col-12 g-col-xl-12">
                                <div>
                                    <label for="update-profile-form-6" class="form-label">Vendor</label>
                                    <div class="mt-2">
                                        <select data-placeholder="Cari Vendor" class="tom-select w-full" name="suplayer">
                                            <option value=""></option>
                                            @foreach ($suplayers as $suplayer)
                                                <option value="{{ $suplayer->nama_suplayer }}"
                                                    @if ($maintenance->suplayer == $suplayer->nama_suplayer) selected @endif>
                                                    {{ $suplayer->nama_suplayer }}</option>
                                            @endforeach
                                        </select>
                                        <div class="text-theme-6 mt-2">{{ $errors->first('suplayer') }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-primary w-20 me-auto">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

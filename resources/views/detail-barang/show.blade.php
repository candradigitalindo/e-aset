@extends('layouts.dashboard')
@section('title')
    Data Barang
@endsection
@section('content')
    <!-- BEGIN: Top Bar -->
    <div class="top-bar">
        <!-- BEGIN: Breadcrumb -->
        <div class="-intro-x breadcrumb me-auto d-none d-sm-flex"> <a href="{{ route('detailbarang.index') }}">Data Barang</a>
            <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a
                href="{{ route('detailbarang.show', $detail->id) }}" class="breadcrumb--active">Detail Barang</a> </div>
        <!-- END: Breadcrumb -->
        <!-- BEGIN: Search -->
        <div class="intro-x position-relative me-3 me-sm-6">


        </div>
        <!-- END: Search -->

    </div>

    <!-- END: Top Bar -->

    <div class="g-col-12 mt-3">
        <div class="intro-y box mt-5">
            <div id="bordered-table" class="p-5">
                <div class="preview">

                    <div class="overflow-x-auto">
                        <table class="table table-bordered" id="ruangan">
                            <tbody>
                                <tr>
                                    <td style="width: 20%">Kode Barang</td>
                                    <td class="text-nowrap">{{ $detail->barang->kode_barang }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 20%">Nama Barang</td>
                                    <td class="text-nowrap">{{ $detail->barang->nama_barang }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 20%">Nomor Urut</td>
                                    <td class="text-nowrap">{{ $detail->nomor_urut }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 20%">Merek / Type</td>
                                    <td class="text-nowrap">{{ $detail->merek_type }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 20%">Tahun Perolehan</td>
                                    <td class="text-nowrap">{{ $detail->tahun_perolehan }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 20%">Lokasi</td>
                                    <td class="text-nowrap">{{ $detail->ruangan->nama_ruangan }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 20%">Keterangan</td>
                                    <td class="text-nowrap">{{ $detail->keterangan }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 20%">Status</td>
                                    <td class="text-nowrap">{{ $detail->status }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Bordered Table -->
    </div>
    {{-- <div class="mt-3">
        <div class="intro-y box mt-5">
            <div id="bordered-table" class="p-5">
                <div class="preview">
                    <div class="overflow-x-auto">
                        <table class="table table-bordered" id="ruangan">
                            <thead>
                                <tr>
                                    <th class="text-nowrap">No</th>
                                    <th class="text-nowrap">Keterangan</th>
                                    <th class="text-nowrap">Tanggal Perbaikan</th>
                                    <th class="text-nowrap">Tanggal Selesai</th>
                                    <th class="text-nowrap">Vendor</th>
                                    @if (auth()->user()->role == "superadmin")
                                    <th class="text-nowrap">Aksi</th>

                                    @endif

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @forelse ($maintenances as $maintenance)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $maintenance->keterangan }}</td>
                                        <td>{{ date('d-m-Y', strtotime($maintenance->tanggal_perbaikan)) }}</td>
                                        <td>{{ date('d-m-Y', strtotime($maintenance->tanggal_selesai)) }}</td>
                                        <td>{{ $maintenance->suplayer }}

                                        </td>
                                        @if (auth()->user()->role == "superadmin")
                                        <td>
                                            <form method="POST" action="{{ route('detailbarang-maintenance.destroy', $maintenance->id) }}">
                                                <a href="{{ route('detailbarang-maintenance.edit', $maintenance->id) }}"
                                                    class="btn btn-warning me-1 mb-2"> <i data-feather="edit"
                                                        class="w-5 h-5"></i> </a>
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger me-1 mb-2"> <i data-feather="trash"
                                                        class="w-5 h-5"></i> </button>
                                            </form>
                                        </td>

                                        @endif
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Data tidak ada</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <div class="text-xs-center">{{ $maintenances->links('pagination::bootstrap-4') }}</div>

            </div>
        </div>
        <!-- END: Bordered Table -->
    </div> --}}
    @if (auth()->user()->role == 'superadmin')
    <div class="row mt-5">
        <div class="intro-y col-12 col-lg-12">
            @include('flash-message')
            <div class="intro-y box">
                <div
                    class="d-flex flex-column flex-sm-row align-items-center p-5 border-bottom border-gray-200 dark-border-dark-5">
                    <h2 class="fw-medium fs-base me-auto">
                        Input Maintenance Barang
                    </h2>

                </div>
                <div id="input" class="p-5">
                    <form action="{{ route('detailbarang-maintenance.store') }}" method="post">
                        @csrf
                    <div class="grid columns-12 gap-x-5">
                        <div class="g-col-12 g-col-xl-12">
                            <input type="hidden" name="barang" value="{{ $detail->id }}">
                            <div>
                                <label for="update-profile-form-6" class="form-label">Keterangan Maintenance</label>
                                <textarea class="form-control" name="keterangan" id="" cols="10" rows="5"></textarea>
                                <div class="text-theme-6 mt-2">{{ $errors->first('keterangan') }}</div>
                            </div>
                        </div>
                        {{-- <div class="g-col-12 g-col-xl-6">
                            <div>
                                <label for="update-profile-form-7" class="form-label">Tanggal Mulai Perbaikan</label>
                                <input id="update-profile-form-7" type="date" class="form-control" name="tanggal_perbaikan">
                                <div class="text-theme-6 mt-2">{{ $errors->first('tanggal_perbaikan') }}</div>
                            </div>
                        </div>
                        <div class="g-col-12 g-col-xl-6">
                            <div class="mt-3 mt-xl-0">
                                <label for="update-profile-form-10" class="form-label">Tanggal Selesai Perbaikan</label>
                                <input id="update-profile-form-10" type="date" class="form-control" name="tanggal_selesai">
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
                                            <option value="{{ $suplayer->nama_suplayer }}" @if (old('suplayer') == $suplayer->nama_suplayer) selected @endif>{{ $suplayer->nama_suplayer }}</option>
                                        @endforeach
                                    </select>
                                    <div class="text-theme-6 mt-2">{{ $errors->first('suplayer') }}</div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-primary w-20 me-auto">Simpan</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>

    @endif

@endsection

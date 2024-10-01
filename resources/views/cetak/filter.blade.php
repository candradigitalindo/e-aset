@extends('layouts.dashboard')
@section('title')
    Data Barang
@endsection
@section('content')
    <!-- BEGIN: Top Bar -->
    <div class="top-bar">
        <!-- BEGIN: Breadcrumb -->
        <div class="-intro-x breadcrumb me-auto d-none d-sm-flex"> <a href="{{ route('home') }}">Dashboard</a> <i
                data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="{{ route('cetak.index') }}"
                class="breadcrumb--active">Cetak Label</a> </div>
        <!-- END: Breadcrumb -->
        <!-- BEGIN: Search -->
        <div class="intro-x position-relative me-3 me-sm-6">


        </div>
        <!-- END: Search -->

    </div>

    <!-- END: Top Bar -->
    <div class="g-col-12 mt-3">
        <div class="intro-y box mt-5">
            <form action="{{ route('cetak.filter') }}" method="post">
                @csrf
                <div
                    class="d-flex flex-column flex-sm-row align-items-center p-5 border-bottom border-gray-200 dark-border-dark-5">

                    <label class="w-12 flex-none w-xl-auto flex-xl-initial me-2">Ruangan</label>
                    <select data-placeholder="Cari Ruangan" class="tom-select w-full me-2" name="ruangan">
                        <option value=""></option>
                        @foreach ($ruangans as $ruangan)
                            <option value="{{ $ruangan->id }}" @if ($data_ruangan->id == $ruangan->id) selected @endif>
                                {{ $ruangan->nama_ruangan }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary w-24 ms-2">Cari</button>
                    <a href="{{ route('cetak.cetak_label', $data_ruangan->id) }}" target="_blank" class="btn btn-warning w-40 ms-2">Cetak Label</a>
                    <a href="{{ route('cetak.cetak_dokumen', $data_ruangan->id) }}" target="_blank" class="btn btn-danger w-52 ms-2">Cetak Dokumen</a>
                </div>
            </form>
            <div id="bordered-table" class="p-5">
                <div class="preview">
                    @include('flash-message')
                    <div class="overflow-x-auto">
                        <table class="table table-bordered" id="ruangan">
                            <thead>
                                <tr>
                                    <th class="text-nowrap">No</th>
                                    <th class="text-nowrap">Kode Barang</th>
                                    <th class="text-nowrap">Nama Barang</th>
                                    <th class="text-nowrap">NUP</th>
                                    <th class="text-nowrap">Merek / Type</th>
                                    <th class="text-nowrap">Thn.Perolehan</th>
                                    <th class="text-nowrap">Ruangan</th>
                                    <th class="text-nowrap">Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($details as $index => $detail)
                                    <tr>
                                        <td>{{ $index + $details->firstItem() }}</td>
                                        <td>{{ $detail->barang->kode_barang }}</td>
                                        <td>{{ $detail->barang->nama_barang }}</td>
                                        <td>{{ $detail->nomor_urut }}</td>
                                        <td>{{ $detail->merek_type }}</td>
                                        <td>{{ $detail->tahun_perolehan }}</td>
                                        <td>{{ $detail->ruangan->nama_ruangan }}</td>
                                        <td><a href="{{ route('cetak.cetak_satuan', $detail->id) }}" target="_blank" class="btn btn-success me-1 mb-2"> <i data-feather="maximize"
                                                    class="w-5 h-5"></i> </a>
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">Data tidak ada</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                    <br>
                <div class="text-xs-center">{{ $details->links('pagination::bootstrap-4') }}</div>
                </div>
            </div>
        </div>
        <!-- END: Bordered Table -->
    </div>
@endsection

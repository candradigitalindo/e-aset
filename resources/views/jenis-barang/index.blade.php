@extends('layouts.dashboard')
@section('title')
    Jenis Barang
@endsection
@section('content')
    <!-- BEGIN: Top Bar -->
    <div class="top-bar">
        <!-- BEGIN: Breadcrumb -->
        <div class="-intro-x breadcrumb me-auto d-none d-sm-flex"> <a href="{{ route('home') }}">Dashboard</a> <i
                data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="{{ route('barang.index') }}"
                class="breadcrumb--active">Jenis Barang</a> </div>
        <!-- END: Breadcrumb -->
        <!-- BEGIN: Search -->
        <div class="intro-x position-relative me-3 me-sm-6">


        </div>
        <!-- END: Search -->

    </div>

    <!-- END: Top Bar -->

    <div class="g-col-12 mt-3">
        <div class="intro-y box mt-5">
            <form action="{{ route('barang.index') }}" method="get">
                @csrf
            <div
                class="d-flex flex-column flex-sm-row align-items-center p-5 border-bottom border-gray-200 dark-border-dark-5">
                @if (auth()->user()->role == 'superadmin')
                <a href="{{ route('barang.create') }}" class="btn btn-primary w-32 me-2 mb-0"> <i data-feather="plus-square"
                        class="w-4 h-4 me-2"></i>
                    Tambah </a>
                @endif
                    <input id="regular-form-1" type="text" class="form-control" name="q"
                        placeholder="Cari berdasarkan Nama Barang">
                    <button type="submit" class="btn btn-primary w-24 ms-2">Cari</button>
                </div>
            </form>
            <div id="bordered-table" class="p-5">
                <div class="preview">
                    <div class="overflow-x-auto">
                        <table class="table table-bordered" id="ruangan">
                            <thead>
                                <tr>
                                    <th class="text-nowrap">No</th>
                                    <th class="text-nowrap">Kode Barang</th>
                                    <th class="text-nowrap">Nama Barang</th>
                                    <th class="text-nowrap">Jumlah Barang</th>
                                    @if (auth()->user()->role == 'superadmin')
                                    <th class="text-nowrap">Aksi</th>
                                    @endif

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($barangs as $index => $barang)
                                    <tr>
                                        <td>{{ $index + $barangs->firstItem() }}</td>
                                        <td>{{ $barang->kode_barang }}</td>
                                        <td>{{ $barang->nama_barang }}</td>
                                        <td>{{ formatPrice($barang->detailbarang->count()) }}</td>
                                        @if (auth()->user()->role == 'superadmin')
                                        <td>
                                            <form method="POST" action="{{ route('barang.destroy', $barang->id) }}">
                                                <a href="{{ route('barang.edit', $barang->id) }}"
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
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Data tidak ada</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <div class="text-xs-center">{{ $barangs->links('pagination::bootstrap-4') }}</div>

            </div>
        </div>
        <!-- END: Bordered Table -->
    </div>
@endsection

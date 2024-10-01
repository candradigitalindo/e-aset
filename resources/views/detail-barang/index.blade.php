@extends('layouts.dashboard')
@section('title')
    Data Barang
@endsection
@section('content')
    <!-- BEGIN: Top Bar -->
    <div class="top-bar">
        <!-- BEGIN: Breadcrumb -->
        <div class="-intro-x breadcrumb me-auto d-none d-sm-flex"> <a href="{{ route('home') }}">Dashboard</a> <i
                data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="{{ route('detailbarang.index') }}"
                class="breadcrumb--active">Data Barang</a> </div>
        <!-- END: Breadcrumb -->
        <!-- BEGIN: Search -->
        <div class="intro-x position-relative me-3 me-sm-6">


        </div>
        <!-- END: Search -->

    </div>

    <!-- END: Top Bar -->

    <div class="g-col-12 mt-3">
        <div class="intro-y box mt-5">
            <form action="{{ route('detailbarang.index') }}" method="get">
                @csrf
                <div
                    class="d-flex flex-column flex-sm-row align-items-center p-5 border-bottom border-gray-200 dark-border-dark-5">
                    @if (auth()->user()->role == 'superadmin')
                        <a href="{{ route('detailbarang.create') }}" class="btn btn-primary w-32 me-2 mb-0"> <i
                                data-feather="plus-square" class="w-4 h-4 me-2"></i>
                            Tambah </a>
                    @endif
                    <input id="regular-form-1" type="text" class="form-control" name="q"
                        placeholder="Cari berdasarkan Nomor urut">
                    <button type="submit" class="btn btn-primary w-24 ms-2">Cari</button>

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
                                    <th class="text-nowrap">Status</th>
                                    <th class="text-nowrap">Detail</th>
                                    @if (auth()->user()->role == 'superadmin')
                                        <th class="text-nowrap">Aksi</th>
                                    @endif

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @forelse ($details as $index => $detail)
                                    <tr>
                                        <td>{{ $index + $details->firstItem() }}</td>
                                        <td>{{ $detail->barang->kode_barang }}

                                        </td>
                                        <td>{{ $detail->barang->nama_barang }}</td>
                                        <td>{{ $detail->nomor_urut }}</td>
                                        <td>{{ $detail->merek_type }}

                                        </td>
                                        <td>{{ $detail->tahun_perolehan }}</td>
                                        <td>{{ $detail->ruangan->nama_ruangan }}</td>
                                        <td class="text-center">
                                            @if ($detail->status == 'Baik')
                                                <div
                                                    class="py-1 px-2 rounded-pill fs-xs bg-theme-9 text-white cursor-pointer fw-medium">
                                                    {{ $detail->status }}
                                                </div>
                                            @elseif ($detail->status == 'Perbaiki')
                                                <div
                                                    class="py-1 px-2 rounded-pill fs-xs bg-theme-11 text-white cursor-pointer fw-medium">
                                                    {{ $detail->status }}
                                                </div>
                                            @elseif($detail->status == 'Rusak')
                                                <div
                                                    class="py-1 px-2 rounded-pill fs-xs bg-theme-6 text-white cursor-pointer fw-medium">
                                                    {{ $detail->status }}
                                                </div>
                                            @else
                                                <div
                                                    class="py-1 px-2 rounded-pill fs-xs bg-theme-20 text-white cursor-pointer fw-medium">
                                                    {{ $detail->status }}
                                                </div>
                                            @endif

                                        </td>
                                        <td><a href="{{ route('detailbarang.show', $detail->id) }}"
                                                class="btn btn-success me-1 mb-2"> <i data-feather="folder"
                                                    class="w-5 h-5"></i> </a></td>
                                        @if (auth()->user()->role == 'superadmin')
                                            <td>
                                                <form method="POST"
                                                    action="{{ route('detailbarang.destroy', $detail->id) }}">
                                                    <a href="{{ route('detailbarang.edit', $detail->id) }}"
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
                                        <td colspan="11" class="text-center">Data tidak ada</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <div class="text-xs-center">{{ $details->links('pagination::bootstrap-4') }}</div>

            </div>
        </div>
        <!-- END: Bordered Table -->
    </div>
@endsection

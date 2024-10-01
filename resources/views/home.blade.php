@extends('layouts.dashboard')
@section('title')
    Dashboard
@endsection
@section('content')
    <!-- BEGIN: Top Bar -->
    <div class="top-bar">
        <!-- BEGIN: Breadcrumb -->
        <div class="-intro-x breadcrumb me-auto d-none d-sm-flex"> <a href="">{{ auth()->user()->name }}</a> <i
                data-feather="chevron-right" class="breadcrumb__icon"></i> <a href=""
                class="breadcrumb--active">{{ auth()->user()->role }}</a> </div>
        <!-- END: Breadcrumb -->
        <!-- BEGIN: Search -->
        <div class="intro-x position-relative me-3 me-sm-6">


        </div>
        <!-- END: Search -->


    </div>
    <!-- END: Top Bar -->
    <div class="grid columns-12 gap-6">
        <div class="g-col-12 g-col-xxl-9">
            <div class="grid columns-12 gap-6">
                <!-- BEGIN: General Report -->
                <div class="g-col-12 mt-8">
                    <div class="intro-y d-flex align-items-center h-10">
                        <h2 class="fs-lg fw-medium truncate me-5">
                            General Report
                        </h2>
                        <a href="" class="ms-auto d-flex align-items-center text-theme-1 dark-text-theme-10"> <i
                                data-feather="refresh-ccw" class="w-4 h-4 me-3"></i> Reload Data </a>
                    </div>
                    <div class="grid columns-12 gap-6 mt-5">
                        <div class="g-col-12 g-col-sm-6 g-col-xl-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="d-flex">
                                        <i data-feather="inbox" class="report-box__icon text-theme-10"></i>

                                    </div>
                                    <div class="report-box__total fs-3xl fw-medium mt-6">{{ formatPrice($ruangan) }}</div>
                                    <div class="fs-base text-gray-600 mt-1">Jumlah Ruangan</div>
                                </div>
                            </div>
                        </div>
                        <div class="g-col-12 g-col-sm-6 g-col-xl-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="d-flex">
                                        <i data-feather="hard-drive" class="report-box__icon text-theme-11"></i>

                                    </div>
                                    <div class="report-box__total fs-3xl fw-medium mt-6">{{ formatPrice($barang) }}</div>
                                    <div class="fs-base text-gray-600 mt-1">Nama Barang</div>
                                </div>
                            </div>
                        </div>
                        <div class="g-col-12 g-col-sm-6 g-col-xl-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="d-flex">
                                        <i data-feather="credit-card" class="report-box__icon text-theme-12"></i>

                                    </div>
                                    <div class="report-box__total fs-3xl fw-medium mt-6">{{  formatPrice($data_barang)  }}</div>
                                    <div class="fs-base text-gray-600 mt-1">Data Barang</div>
                                </div>
                            </div>
                        </div>
                        <div class="g-col-12 g-col-sm-6 g-col-xl-3 intro-y">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="d-flex">
                                        <i data-feather="user" class="report-box__icon text-theme-9"></i>

                                    </div>
                                    <div class="report-box__total fs-3xl fw-medium mt-6">{{  formatPrice($user)  }}</div>
                                    <div class="fs-base text-gray-600 mt-1">Jumlah Pengguna</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: General Report -->

                <!-- BEGIN: Weekly Top Products -->
                <div class="g-col-12 mt-3">
                    <div class="intro-y box mt-5">
                        <div
                            class="d-flex flex-column flex-sm-row align-items-center p-5 border-bottom border-gray-200 dark-border-dark-5">
                            <h2 class="fw-medium fs-base me-auto">
                                Data Perolehan Aset Tahun {{ date('Y') }}
                            </h2>

                        </div>
                        <div id="bordered-table" class="p-5">
                            <div class="preview">
                                <div class="overflow-x-auto">
                                    <table class="table table-bordered" id="perolehan">
                                        <thead>
                                            <tr>
                                                <th class="text-nowrap">No</th>
                                                <th class="text-nowrap">Kode Barang</th>
                                                <th class="text-nowrap">Nama Barang</th>
                                                <th class="text-nowrap">NUP</th>
                                                <th class="text-nowrap">Merek/Type</th>
                                                <th class="text-nowrap">Tahun Perolehan</th>
                                                <th class="text-nowrap">Ruangan</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($data_perolehan as $perolehan)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $perolehan->barang->kode_barang }}</td>
                                                <td>{{ $perolehan->barang->nama_barang }}</td>
                                                <td>{{ $perolehan->nomor_urut }}</td>
                                                <td>{{ $perolehan->merek_type }}</td>
                                                <td>{{ $perolehan->tahun_perolehan }}</td>
                                                <td>{{ $perolehan->ruangan->nama_ruangan }}</td>
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
                <!-- END: Weekly Top Products -->
                <div class="g-col-12 mt-1">
                    <div class="intro-y box mt-2">
                        <div
                            class="d-flex flex-column flex-sm-row align-items-center p-5 border-bottom border-gray-200 dark-border-dark-5">
                            <h2 class="fw-medium fs-base me-auto">
                                Maintenance Aset Tahun {{ date('Y') }}
                            </h2>

                        </div>
                        <div id="bordered-table" class="p-5">
                            <div class="preview">
                                <div class="overflow-x-auto">
                                    <table class="table table-bordered" id="maintenance">
                                        <thead>
                                            <tr>
                                                <th class="text-nowrap">No</th>
                                                <th class="text-nowrap">Kode Barang</th>
                                                <th class="text-nowrap">Nama Barang</th>
                                                <th class="text-nowrap">Merek/Type</th>
                                                <th class="text-nowrap">Keterangan</th>
                                                <th class="text-nowrap">Vendor</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($maintenences as $maintenence)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $maintenence->kode_barang }}</td>
                                                <td>{{ $maintenence->nama_barang }}</td>
                                                <td>{{ $maintenence->merek_type }}</td>
                                                <td>{{ $maintenence->keterangan }}</td>
                                                <td>{{ $maintenence->suplayer }}</td>

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
            $('#perolehan').DataTable();
            $('#maintenance').DataTable();
        });
    </script>
@endsection

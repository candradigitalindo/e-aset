@extends('layouts.dashboard')
@section('title')
    Import Barang
@endsection
@section('content')
    <!-- BEGIN: Top Bar -->
    <div class="top-bar">
        <!-- BEGIN: Breadcrumb -->
        <div class="-intro-x breadcrumb me-auto d-none d-sm-flex"> <a href="{{ route('home') }}">Dashboard</a> <i
                data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="{{ route('import.index') }}"
                class="breadcrumb--active">Import Barang</a> </div>
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
                        Import Barang
                    </h2>

                </div>
                <div id="input" class="p-5">
                    <div class="preview">
                        <form action="{{ route('import.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <label for="regular-form-1" class="form-label">File Excel</label>
                                <input id="regular-form-1" type="file" class="form-control" name="file">
                                <div class="text-theme-6 mt-2">{{ $errors->first('file') }}</div>
                            </div>
                            <hr class="mt-3">
                            <div>

                                <p style="text-align: justify;">Ketentuan Import Barang :</p>
                                <ul>
                                    <li style="text-align: justify;">Fitur inport barang dengan Excel merupakan bantuan untuk
                                        input data barang secara kolektif (dalam jumlah banyak).</li>
                                    <li style="text-align: justify;">Template File Excel dapat di download <a href="{{ asset('file/TEMPLATE IMPORT BARANG.xlsx') }}" style="color: blue">disini.</a> </li>
                                    <li style="text-align: justify;">Judul File yang diberi tanda kuning tidak boleh dihapus
                                        atau diubah.</li>
                                    <li style="text-align: justify;">Jika terdapat Nama Ruangan atau Kode Ruangan, Nama Barang
                                        atau Kode Barang yang sama maka data tetap akan masuk dalam database.</li>
                                </ul>
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
@section('css')
    <style>
        li {
            font-size: 14px;
            margin-left: 10px;
            list-style-type: circle;
        }
    </style>
@endsection

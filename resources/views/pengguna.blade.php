@extends('layouts.pengguna')
@section('title')
    Pengguna
@endsection
@section('content')
<!-- BEGIN: Top Bar -->
<div class="top-bar">
    <!-- BEGIN: Breadcrumb -->
    <div class="-intro-x breadcrumb me-auto d-none d-sm-flex"> <a href="{{ route('home') }}">Dashboard</a></div>
    <!-- END: Breadcrumb -->
    <!-- BEGIN: Search -->
    <div class="intro-x position-relative me-3 me-sm-6">


    </div>
    <!-- END: Search -->

</div>

<!-- END: Top Bar -->
<div class="g-col-12 mt-3">
    <div class="intro-y box mt-5">
        <form action="{{ route('pengguna.filter') }}" method="post">
            @csrf
            <div
                class="d-flex flex-column flex-sm-row align-items-center p-5 border-bottom border-gray-200 dark-border-dark-5">

                <label class="w-12 flex-none w-xl-auto flex-xl-initial me-2">Ruangan</label>
                <select data-placeholder="Cari Ruangan" class="tom-select w-full me-2" name="ruangan">
                    <option value=""></option>
                    @foreach ($ruangans as $ruangan)
                    <option value="{{ $ruangan->id }}">{{ $ruangan->nama_ruangan }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary w-24 ms-2">Cari</button>
            </div>
        </form>
        <div id="bordered-table" class="p-5">
            <div class="text-theme-6 mt-2">{{ $errors->first('ruangan') }}</div>
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
                            <tr>
                                <td colspan="8" class="text-center">Data tidak ada</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Bordered Table -->
</div>
@endsection

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Data Barang </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="col-sm-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th colspan="2">Identitas Barang</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Kode Barang</td>
                                <td>{{ $detail->kode_barang }}</td>
                            </tr>
                            <tr>
                                <td>Nama Barang</td>
                                <td>{{ $detail->barang->nama_barang }}</td>
                            </tr>
                            <tr>
                                <td>Merk / Type</td>
                                <td>{{ $detail->merek_type }}</td>
                            </tr>
                            <tr>
                                <td>Nomor Urut</td>
                                <td>{{ $detail->nomor_urut }}</td>
                            </tr>
                            <tr>
                                <td>Thn.Perolehan</td>
                                <td>{{ $detail->tahun_perolehan }}</td>
                            </tr>
                            <tr>
                                <td>Lokasi</td>
                                <td>{{ $detail->ruangan->nama_ruangan }}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>{{ $detail->status }}</td>
                            </tr>
                            <tr>
                                <td>Perawatan Terakhir</td>
                                <td>{{ $mainten }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row justify-content-evenly mt-5">
                        <div class="col-6">
                            <a href="{{ route('scan.index') }}" type="button" class="btn btn-success">Scan Ulang</a>
                        </div>
                        <div class="col-4">
                            <a href="/" type="button" class="btn btn-warning">Tutup</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>

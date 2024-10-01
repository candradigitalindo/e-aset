<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $detail->barang->kode_barang }} - {{ $detail->barang->nama_barang }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script>
        window.print();
        window.onafterprint = function() {
            setTimeout(function() {
                window.close();
            }, 1000);
        }
    </script>
</head>

<body>
    <div class="row">
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
                                <td>{{ $detail->barang->kode_barang }}</td>
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
                        </tbody>
                    </table>
                    <div class="row justify-content-between">
                        <div class="col-4">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>{!! QrCode::size(100)->generate($detail->nomor_urut); !!}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-5">
                            <table>
                                <tbody>
                                    <tr>
                                        <td><img src="{{ asset('assets/front/logo.png') }}" alt=""
                                                height="100" width="100"></td>
                                    </tr>
                                </tbody>
                            </table>
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

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Data Barang Tidak Ada </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="container">
            <div class="col-sm-6 mb-3">
                <div class="card text-center">
                    <div class="card-body">
                        <img src="{{ asset('assets/front/red.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Barcode Barang tidak ditemukan</h5>
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
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>

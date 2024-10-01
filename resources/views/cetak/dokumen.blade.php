<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script>
        var css = '@page { size: legal landscape }',
            head = document.head || document.getElementsByTagName('head')[0],
            style = document.createElement('style');

        style.type = 'text/css';
        style.media = 'print';

        if (style.styleSheet) {
            style.styleSheet.cssText = css;
        } else {
            style.appendChild(document.createTextNode(css));
        }

        head.appendChild(style);

        window.print();
        window.onafterprint = function() {
            setTimeout(function() {
                window.close();
            }, 1000);
        }
    </script>
    <style>
        .page-break {
            page-break-after: always;
        }
    </style>

</head>

<body>
    <div class="container">
        <h4 style="text-align: center;"><strong>DAFTAR BARANG RUANGAN</strong></h4>
    </div>
    <br>
    <table class="mt-1 mb-1">
        <tbody>
            <tr>
                <td style="width: 35%">NAMA UAKPB</td>
                <td style="width: 2%">:</td>
                <td>KANTOR REGIONAL VI BADAN KEPEGAWAIAN NEGARA MEDAN</td>
            </tr>
            <tr>
                <td>NAMA RUANGAN</td>
                <td>:</td>
                <td>{{ strtoupper($ruangan->nama_ruangan) }}</td>
            </tr>
            <tr>
                <td>KODE RUANGAN</td>
                <td>:</td>
                <td>{{ strtoupper($ruangan->kode_ruangan) }}</td>
            </tr>
        </tbody>
    </table>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="font-size: 10px; text-align: center;">NO</th>
                <th style="font-size: 10px; text-align: center;">Kode Barang</th>
                <th style="font-size: 10px; text-align: center;">Nama Barang</th>
                <th style="font-size: 10px; text-align: center;">NUP</th>
                <th style="font-size: 10px; text-align: center;">Merk / Type</th>
                <th style="font-size: 10px; text-align: center;">Thn. Perolehan</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp

            @foreach ($details as $detail)
                <tr>
                    <td style="font-size: 10px; text-align: center;">{{ $no++ }}</td>
                    <td style="font-size: 10px;">{{ $detail->kode_barang }}</td>
                    <td style="font-size: 10px;">{{ $detail->barang->nama_barang }}</td>
                    <td style="font-size: 10px; text-align: center;">{{ $detail->nomor_urut }}</td>
                    <td style="font-size: 10px;">{{ $detail->merek_type }}</td>
                    <td style="font-size: 10px; text-align: center;">{{ $detail->tahun_perolehan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p style="font-size: 12px; text-align: center;">Tidak dibenarkan memindahkan barang-barang yang ada pada daftar ini
        tanpa sepengetahuan penanggung jawab Unit Akutansi Kuasa Pengguna barang (UAKPB) dan penanggung jawab ruangan
        ini</p>
    <hr class="mt-3">
    <div class="row justify-content-evenly">
        <div class="col-4">

        </div>
        <div class="col-4">
            <div class="text-center">
                KOTA MEDAN, {{ date('d M Y') }}

            </div>
        </div>
    </div>
    <br>
    <div class="row justify-content-evenly">
        <div class="col-4">
            <div class="text-center">
                <strong>Satker Pengguna Ruangan</strong> <br>
                Penanggung Jawab UAPKPB/UAKPB

            </div>

            <div class="text-center">
                <div class="row">
                    <br>
                    <br>
                    <br>

                </div>
                <strong>{{ $data->nama }}</strong><br>
                <strong>NIP. {{ $data->nip }}</strong>
            </div>
        </div>
        <div class="col-4">
            <div class="text-center">
                Penanggung Jawab Ruangan
            </div>

            <div class="text-center">
                <div class="row">
                    <br>
                    <br>
                    <br>
                    <br>
                </div>
                <strong>{{ $ruangan->penanggung_jawab }}</strong><br>
                <strong>NIP. {{ $ruangan->nip }}</strong>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>

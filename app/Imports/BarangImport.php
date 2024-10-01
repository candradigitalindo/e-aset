<?php

namespace App\Imports;

use App\Models\Barang;
use App\Models\Detailbarang;
use App\Models\Ruangan;
use App\Traits\Uuid;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BarangImport implements ToModel, WithHeadingRow
{
    use Uuid;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        //CEK DATA RUANGAN
        $ruangan = Ruangan::where('kode_ruangan', (string) $row['kode_ruangan'])->first();
        if (!$ruangan) {
            Ruangan::create([
                'kode_ruangan'  => (string) $row['kode_ruangan'],
                'nama_ruangan'  => (string) $row['nama_ruangan']
            ]);
        }

        $barang = Barang::where('kode_barang', (string) $row['kode_barang'])->first();
        if (!$barang) {
            Barang::create([
                'kode_barang'  => (string) $row['kode_barang'],
                'nama_barang'  => (string) $row['nama_barang']
            ]);
        }
        $data_ruangan = Ruangan::where('kode_ruangan', (string) $row['kode_ruangan'])->first();
        $data_barang  = Barang::where('kode_barang', (string) $row['kode_barang'])->first();
        $cek = Detailbarang::max('nomor_urut');
        if ($cek) {
            return new Detailbarang([
                'ruangan_id'    => $data_ruangan->id,
                'barang_id'     => $data_barang->id,
                'kode_barang'   => $data_barang->kode_barang,
                'nomor_urut'    => (int) $cek + 1,
                'merek_type'    => (string) $row['merek_type'],
                'tahun_perolehan' => (string) $row['tahun_perolehan'],
                'keterangan'    => $row['keterangan'],
                'status'        => (string) $row['status'],
            ]);
        }else {
            return new Detailbarang([
                'ruangan_id'    => $data_ruangan->id,
                'barang_id'     => $data_barang->id,
                'kode_barang'   => $data_barang->kode_barang,
                'nomor_urut'    => 1,
                'merek_type'    => (string) $row['merek_type'],
                'tahun_perolehan' => (string) $row['tahun_perolehan'],
                'keterangan'    => $row['keterangan'],
                'status'        => (string) $row['status'],
            ]);
        }
    }
}

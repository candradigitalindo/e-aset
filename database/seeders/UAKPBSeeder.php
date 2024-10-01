<?php

namespace Database\Seeders;

use App\Models\UAKPB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UAKPBSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = UAKPB::first();
        if ($data) {
            UAKPB::truncate();
            UAKPB::create([
                'nama'      => 'Dr.Janry H.U.P. Simanungkalit, S.Si., M.Si.',
                'nip'       => '197501092001121001',
            ]);
        }else {
            UAKPB::create([
                'nama'      => 'Dr.Janry H.U.P. Simanungkalit, S.Si., M.Si.',
                'nip'       => '197501092001121001',
            ]);
        }
    }
}

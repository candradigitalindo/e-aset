<?php

namespace Database\Seeders;

use App\Models\Ruangan;
use App\Models\Ruanganuser;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();
        if ($user) {
            User::query()->delete();
            $user = User::create([
                'name'      => 'Superadmin',
                'username'  => 'superadmin',
                'password'  => '12345678'
            ]);

            $ruangans = Ruangan::all();
            if ($ruangans) {
                $ruanganuser = Ruanganuser::first();
                if ($ruanganuser) {
                    Ruanganuser::query()->delete();
                }
                foreach ($ruangans as $ruangan) {
                    Ruanganuser::create([
                        'user_id'   => $user->id,
                        'ruangan_id'=> $ruangan->id
                    ]);
                }
            }

        }else {
            $user = User::create([
                'name'      => 'Superadmin',
                'username'  => 'superadmin',
                'password'  => '12345678'
            ]);

            $ruangans = Ruangan::all();
            if ($ruangans) {
                $ruanganuser = Ruanganuser::first();
                if ($ruanganuser) {
                    Ruanganuser::query()->delete();
                }
                foreach ($ruangans as $ruangan) {
                    Ruanganuser::create([
                        'user_id'   => $user->id,
                        'ruangan_id'=> $ruangan->id
                    ]);
                }
            }
        }
    }
}

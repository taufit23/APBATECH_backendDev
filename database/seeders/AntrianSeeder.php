<?php

namespace Database\Seeders;

use App\Models\AntrianSoal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AntrianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AntrianSoal::create([
            'int' => 694,
            'nomorantrean' => 'A1',
            'angkaantrean' => 1,
            'norm' => 002,
            'namapoli' => 'POLI KANDUNGAN',
            'kodepoli' => 001,
            'tglpriksa' => '2023-04-02',
            'nomorkartu' => 00000001,
            'nik' => 0202020202,
            'keluhan' => 'sakit kepala',
            'statusdipanggil' => 0,
        ]);
        AntrianSoal::create([
            'int' => 695,
            'nomorantrean' => 'A2',
            'angkaantrean' => 2,
            'norm' => 003,
            'namapoli' => 'POLI GIGI',
            'kodepoli' => 002,
            'tglpriksa' => '2023-04-02',
            'nomorkartu' => 00000002,
            'nik' => 0304050202,
            'keluhan' => 'sakit gigi',
            'statusdipanggil' => 0,
        ]);
        AntrianSoal::create([
            'int' => 696,
            'nomorantrean' => 'A3',
            'angkaantrean' => 3,
            'norm' => 004,
            'namapoli' => 'POLI Kandungan',
            'kodepoli' => 003,
            'tglpriksa' => '2023-04-02',
            'nomorkartu' => 00000003,
            'nik' => 0304050203,
            'keluhan' => 'nyeri pada kandungan 6 bulan',
            'statusdipanggil' => 0,
        ]);
    }
}

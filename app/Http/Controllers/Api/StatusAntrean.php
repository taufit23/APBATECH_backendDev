<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AntrianSoal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StatusAntrean extends Controller
{
    public function statusAntrian($kodePoli, $tanggalPerikasa)
    {
        $antrian = AntrianSoal::all();
        $antrianbelumpanggil = $antrian->where('statusdipanggil', 0)->count();
        $antrianstatus = AntrianSoal::where('kodepoli', $kodePoli)->where('tglpriksa', $tanggalPerikasa)->first();
        return response()->json([
            'response' => [
                'namapoli' => $antrianstatus->namapoli,
                'totalantrean' => $antrian->count(),
                'sisaantrean' => $antrianbelumpanggil,
                'antreanpanggil' => $antrianstatus->nomorantrean,
                'keterangan' => ''
            ],
            "metadata" => [
                "message" =>  "Ok",
                "code" =>  200
            ]

        ]);
    }
    public function new(Request $request)
    {
        $data = AntrianSoal::where('nomorkartu', $request->nomorkartu)->first();
        if ($data) {
            return response()->json([
                'response' => $data,
                "metadata" => [
                    "message" =>  "Suksess",
                    "code" =>  200
                ]
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'nomorantrean' => 'required',
                'norm' => 'required',
                'namapoli' => 'required',
                'kodepoli' => 'required',
                'tglpriksa' => 'required',
                'nomorkartu' => 'required',
                'nik' => 'required',
                'keluhan' => 'required',
                'statusdipanggil' => 'required',
                'angkaantrean' => 'required'
            ]);
            // dd($validator);
            if ($validator->fails()) {
                return response()->json(['status' => 'Error', 'code' => 201, 'errors' => $validator->errors()]);
            } else {
                $antrian = new AntrianSoal();
                $antrian->nomorantrean = $request->nomorantrean;
                $antrian->norm = $request->norm;
                $antrian->namapoli = $request->namapoli;
                $antrian->kodepoli = $request->kodepoli;
                $antrian->tglpriksa = $request->tglpriksa;
                $antrian->nomorkartu = $request->nomorkartu;
                $antrian->nik = $request->nik;
                $antrian->keluhan = $request->keluhan;
                $antrian->statusdipanggil = $request->statusdipanggil;
                $antrian->angkaantrean = $request->angkaantrean;
                $antrian->save();
            }
            return response()->json([
                'response' => $antrian,
                "metadata" => [
                    "message" =>  "Pasien baru",
                    "code" =>  202
                ]
            ]);
        }
    }
    public function sisapeserta($nomorkartu, $kode_poli, $tanggalperiksa)
    {
        $sisapeserta = AntrianSoal::all();
        $antriansekarang = $sisapeserta->where('kodepoli', $kode_poli)->where('tglpriksa', $tanggalperiksa)->where('nomorkartu', $nomorkartu)->first();
        $sisaantrian = $sisapeserta->where('statuspanggil', 0)->count() - $sisapeserta->where('statuspanggil', 1)->count();
        // dd($sisaantrian);/
        return response()->json([
            'response' => [
                "nomorantrean" => $antriansekarang->nomorantrean,
                "namapoli" => $antriansekarang->namapoli,
                "sisaantrean" => $sisaantrian,
                "antreanpanggil" => $antriansekarang->nomorantrean,
                "keterangan" => ""
            ],
            "metadata" => [

                "message" => "Ok",
                "code" => 200
            ]

        ]);
    }
    public function batal($int)
    {
        $antrian = AntrianSoal::where('int', $int)->first();
        // dd($antrian);
        $antrian->nomorantrean = null;
        $antrian->angkaantrean = null;
        $antrian->statusdipanggil = 3;
        $antrian->save();

        return response()->json([
            'response' => [

                "nomorkartu" => $antrian->nomorkartu,
                "kodepoli" => $antrian->kodepoli,
                "tanggalperiksa" => $antrian->tglpriksa
            ],
            'status' => [
                'message' => 'Antrian dibatalkan',
                'code' => 200
            ]
        ]);
    }
}

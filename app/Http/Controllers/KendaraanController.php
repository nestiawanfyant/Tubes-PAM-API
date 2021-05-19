<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Model
use App\Models\Kendaraan;

class KendaraanController extends Controller
{

    public function getDataPengajuanByUser($user_id)
    {
        $data = Kendaraan::where('user_id', $user_id)->get();

        if($data){
            return response()->json([
                'status'    => true,
                'message'   => 'Berhasil Mengambil Data',
                'data'      => $data,
            ], 201);
        } else {
            return response()->json([
                'status'    => false,
                'message'   => 'Gagal Mengambil Data',
                'data'      => ""
            ], 400);
        }
    }
    
    public function insertPengajuan(Request $input)
    {
        $kendaraan                          = new Kendaraan; 
        $kendaraan->user_id                 = $input->input('user_id');
        $kendaraan->namaPemilik             = $input->input('namaPemilik');
        $kendaraan->NIKPemilik              = $input->input('NIKPemilik');
        $kendaraan->alamatRumah             = $input->input('alamatRumah');
        $kendaraan->noTelfon                = $input->input('noTelfon');
        $kendaraan->provinsi                = $input->input('provinsi');
        $kendaraan->kota                    = $input->input('kota');
        $kendaraan->kodePos                 = $input->input('kodePos');
        $kendaraan->jenisKendaraan          = $input->input('jenisKendaraan');
        $kendaraan->tahunKendaraan          = $input->input('tahunKendaraan');
        $kendaraan->merekKendaraan          = $input->input('merekKendaraan');
        $kendaraan->warnaKendaraan          = $input->input('warnaKendaraan');
        $kendaraan->typeKendaraan           = $input->input('typeKendaraan');
        $kendaraan->nomorRangkaKendaraan    = $input->input('nomorRangkaKendaraan');
        $kendaraan->nomotMesinKendaraan     = $input->input('nomotMesinKendaraan');
        $kendaraan->nomotPlatKendaraan      = $input->input('nomotPlatKendaraan');
        $kendaraan->batasPenitipan          = $input->input('batasPenitipan');
        $kendaraan->catatan                 = $input->input('catatan');

        if($kendaraan->save()){
            return response()->json([
                'status'    => true,
                'message'   => 'Berhasil Menngajukan Penitipan, Mohon ditunggu. Pengajuan kamu sedang kami proses.',
            ], 201);
        } else {
            return response()->json([
                'status'    => false,
                'message'   => 'Sedang dalam Masalah, Silakan coba melakukan penhajuan kembali',
            ], 400);
        }
    }

}

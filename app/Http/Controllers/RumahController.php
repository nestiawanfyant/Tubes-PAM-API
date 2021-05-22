<?php

namespace App\Http\Controllers;

use App\Models\Rumah;
use Illuminate\Http\Request;

class RumahController extends Controller
{
    public function getAllRumah()
    {
        $data = Rumah::orderBy('created_at', 'DESC')->get();

        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Berhasil Mengambil Data',
                'data' => $data,
            ], 201);
        } else {
            return response()->json([
                'status'    => false,
                'message'   => 'Gagal Mengambil Data',
                'data'      => ""
            ], 400);
        }
    }

    public function statusAcc(Request $input)
    {
        $idRumah = $input->input('idRumah');
        $getData = Rumah::find($idRumah);
    }

    public function getRumahbyID($id)
    {
        $data = Rumah::find($id);

        if ($data) {
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

    public function getDataPengajuanByUser($user_id)
    {
        $data = Rumah::where('user_id', $user_id)->orderBy('created_at', 'DESC')->get();

        if ($data) {
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
        $Rumah                          = new Rumah;
        $Rumah->user_id                 = $input->input('user_id');
        $Rumah->namaPemilik             = $input->input('namaPemilik');
        $Rumah->NIKPemilik              = $input->input('NIKPemilik');
        $Rumah->alamatRumah             = $input->input('alamatRumah');
        $Rumah->noTelfon                = $input->input('noTelfon');
        $Rumah->provinsi                = $input->input('provinsi');
        $Rumah->kota                    = $input->input('kota');
        $Rumah->kodePos                 = $input->input('kodePos');
        $Rumah->batasPenitipan          = $input->input('batasPenitipan');
        $Rumah->catatan                 = $input->input('catatan');

        if ($Rumah->save()) {
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

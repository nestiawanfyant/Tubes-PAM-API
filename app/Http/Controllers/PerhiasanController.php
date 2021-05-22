<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Model
use App\Models\Perhiasan;

class PerhiasanController extends Controller
{
    public function getAllPerhiasan()
    {
        $data = Perhiasan::orderBy('created_at', 'DESC')->get();

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
        $idPerhiasan = $input->input('idPerhiasan');
        $getData = Perhiasan::find($idPerhiasan);
    }

    public function getPerhiasanbyID($id)
    {
        $data = Perhiasan::find($id);

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
        $data = Perhiasan::where('user_id', $user_id)->orderBy('created_at', 'DESC')->get();
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
        $perhiasan                          = new Perhiasan;
        $perhiasan->user_id                 = $input->input('user_id');
        $perhiasan->namaPemilik             = $input->input('namaPemilik');
        $perhiasan->NIKPemilik              = $input->input('NIKPemilik');
        $perhiasan->alamatRumah             = $input->input('alamatRumah');
        $perhiasan->noTelfon                = $input->input('noTelfon');
        $perhiasan->provinsi                = $input->input('provinsi');
        $perhiasan->kota                    = $input->input('kota');
        $perhiasan->kodePos                 = $input->input('kodePos');
        $perhiasan->jenisPerhiasan          = $input->input('jenisPerhiasan');
        $perhiasan->beratPerhiasan          = $input->input('beratPerhiasan');
        $perhiasan->batasPenitipan          = $input->input('batasPenitipan');
        $perhiasan->catatan                 = $input->input('catatan');

        if ($perhiasan->save()) {
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

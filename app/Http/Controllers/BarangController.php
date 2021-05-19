<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Barang;

class BarangController extends Controller
{
    
    public function getDataPengajuanByUser($user_id)
    {
        $data = Barang::where('user_id', $user_id)->get();

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
                'data'      => ,
            ], 400);
        }
    }

    public function insertPengajuan(Request $input)
    {
        $Barang                         = new Barang;
        $Barang->user_id                = $input->input('user_id');
        $Barang->namaPemilik            = $input->input('namaPemilik');
        $Barang->NIKPemiik              = $input->input('NIKPemilik');
        $Barang->alamatRumah            = $input->input('alamatRumah');
        $Barang->noTelfon               = $input->input('noTelfon');
        $Barang->provinsi               = $input->input('provinsi');
        $Barang->kota                   = $input->input('kota');
        $Barang->kodePos                = $input->input('kodePos');
        $Barang->namaBarang             = $request->namaBarang;
        $Barang->merekbarang            = $request->merekbarang;
        $Barang->warnaBarang            = $request->warnaBarang;
        $Barang->jenisBarang            = $request->jenisBarang;
        $Barang->noSeriBarang           = $request->noSeriBarang;
        $Barang->batasPenitipan         = $request->batasPenitipan;
        $Barang->catatan                = $request->catatan;
        $Barang->status                 = $request->status;
        $Barang->confirmed              = $request->confirmed;
    }

    if($Barang->save()){
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

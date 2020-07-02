<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Model\Konsumen;
use App\Model\Transaksi;

class ActionController extends Controller{

    public function konsumen(Request $req){
        $konsumen = Konsumen::get();
		return view('konsumen', compact('konsumen'));
    }

    public function konsumenTambah(Request $req){
        $data = null;
        return view('konsumenTambah', compact('data'));
    }
    public function konsumenLihat(Request $req, $id){
        $data = Konsumen::find($id);
        return view('konsumenTambah', compact('data'));
    }
    public function konsumenHapus(Request $req, $id){
        $data = Konsumen::find($id);
        $data->delete();
        return redirect()->route('konsumen.index');
    }
    public function konsumenSimpan(Request $req){
        if (empty($req->id)) {
            $store = new Konsumen;
        }else{
            $store = Konsumen::find($req->id);
        }
        $store->konsumen = $req->konsumen;
        $store->jenis_kendaraan = $req->jenis_kendaraan;
        $store->no_polisi = $req->no_polisi;
        $store->tgl_lahir = $req->tgl_lahir;
        $store->jenis_kelamin = $req->jenis_kelamin;
        $store->no_hp = $req->no_hp;
        $store->save();
        return redirect()->route('konsumen.index');
    }

    
}
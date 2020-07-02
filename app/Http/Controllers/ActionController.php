<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Model\Konsumen;
use App\Model\Transaksi;

class ActionController extends Controller{

    public function konsumen(Request $req){
        $konsumen = Konsumen::orderBy('updated_at', 'desc')->get();
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
            $konsumen = Konsumen::where('no_polisi',$req->no_polisi)->count();
            if ($konsumen > 0) {
                return redirect()->back()->with('info', 'no polisi telah terdaftar');
            }
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

    
    public function transaksi(Request $req){
        $transaksi = Transaksi::orderBy('updated_at', 'desc')->get();
        return view('transaksi', compact('transaksi'));
    }
    public function transaksiTambah(Request $req){
        $data = null;
        return view('transaksiTambah', compact('data'));
    }
    public function transaksiLihat(Request $req, $id){
        $data = transaksi::find($id);
        return view('transaksiTambah', compact('data'));
    }
    public function transaksiSimpan(Request $req){
        $konsumen = Konsumen::where('no_polisi',$req->no_polisi)->get();
        if (empty($konsumen)) {
            return redirect()->back()->with('info', 'no polisi tidak ditemukan');
        }
        $konsumen = $konsumen[0];
        if (empty($req->id)) {
            $store = new Transaksi;
            $store->konsumen = $konsumen->konsumen;
            $store->no_polisi = $req->no_polisi;
            $store->tgl_masuk = $req->tgl_masuk;
            $store->waktu_masuk = $req->waktu_masuk;
            $store->save();
        }else{
            $store = Transaksi::find($req->id);
            $store->waktu_keluar = $req->waktu_keluar;
            $store->save();
            $t1 = explode(':', $store->waktu_keluar);
            $t2 = explode(':', $store->waktu_masuk);
            $t1 = ($t1[0]*60)+$t1[1];
            $t2 = ($t2[0]*60)+$t2[1];
            $jam = $t1-$t2;
            $jam = ($jam/60)-2;
            $jam = ceil($jam);
            if ($konsumen->jenis_kendaraan == 'motor') {
                $tariff1 = 2000;
                $tariff2 = 500;
            }else{
                $tariff1 = 5000;
                $tariff2 = 1000;
            }
            $biaya1 = 1*$tariff1;
            $biaya2 = $jam*$tariff2;
            $biaya = $biaya1+$biaya2;
            $store->biaya = $biaya;
            $store->save();
        }
        return redirect()->route('transaksi.index');
    }
}
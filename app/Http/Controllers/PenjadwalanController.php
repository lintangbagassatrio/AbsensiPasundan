<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Penjadwalan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenjadwalanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $namaGuru = User::all()->where('roles_id', 2)->pluck('name');
        $penjadwalan = Penjadwalan::All();
        return view('penjadwalan', compact('penjadwalan', 'namaGuru'));
    }

    public function submit(Request $req)
    {
        $validate = $req->validate([
            'kelas' =>'required',
            'guru' =>'required',
            'pelajaran' =>'required',
            'jurusan' =>'required',
            'hari' =>'required',
            'waktu_mulai' =>'required',
            'waktu_selesai' =>'required',
        ]);
        $penjadwalan = new Penjadwalan;
        $penjadwalan->kelas = $req->get('kelas');
        $penjadwalan->guru = $req->get('guru');
        $penjadwalan->pelajaran = $req->get('pelajaran');
        $penjadwalan->jurusan = $req->get('jurusan');
        $penjadwalan->hari = $req->get('hari');
        $penjadwalan->waktu_mulai = $req->get('waktu_mulai');
        $penjadwalan->waktu_selesai = $req->get('waktu_selesai');
        $penjadwalan->save();
        $notification = array(
            'message' =>'Data Penjadwalan berhasil ditambahkan', 'alert-type' =>'success'
        );
        return redirect()->route('penjadwalan')->with($notification);
    }

    public function getDataPenjadwalan($id)
    {
        $penjadwalan = Penjadwalan::find($id);
        return response()->json($penjadwalan);
    }

    public function ubah(Request $req)
    {
        $penjadwalan = Penjadwalan::find($req->get('id'));
        $validate = $req->validate([
            'kelas' =>'required',
            'guru' =>'required',
            'pelajaran' =>'required',
            'jurusan' =>'required',
            'hari' =>'required',
            'waktu_mulai' =>'required',
            'waktu_selesai' =>'required',
        ]);
        $penjadwalan->kelas = $req->get('kelas');
        $penjadwalan->guru = $req->get('guru');
        $penjadwalan->pelajaran = $req->get('pelajaran');
        $penjadwalan->jurusan = $req->get('jurusan');
        $penjadwalan->hari = $req->get('hari');
        $penjadwalan->waktu_mulai = $req->get('waktu_mulai');
        $penjadwalan->waktu_selesai = $req->get('waktu_selesai');
        $penjadwalan->save();
        $notification = array(
            'message' => 'Data Penjadwalan berhasil diubah', 'alert-type' => 'success'
        );

        return redirect()->route('penjadwalan')->with($notification);
    }

    public function hapus($id) {
        $penjadwalan = Penjadwalan::find($id);
        $penjadwalan->delete();
        $success = true;
        $message = "Data Penjadwalan berhasil dihapus";
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
}

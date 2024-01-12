<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KelasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $kelas = Kelas::All();
        $namaJurusan = Jurusan::all();
        return view('kelas', compact('kelas', 'namaJurusan'));
    }

    public function submit(Request $req)
    {
        $validate = $req->validate([
            'nama' => 'required|max:255',
            'jurusan' =>'required',
        ]);
        $kelas = new Kelas;
        $kelas->nama = $req->get('nama');
        $kelas->jurusan = $req->get('jurusan');
        $kelas->save();
        $notification = array(
            'message' =>'Data Kelas berhasil ditambahkan', 'alert-type' =>'success'
        );
        return redirect()->route('kelas')->with($notification);
    }

    public function getDataKelas($id)
    {
        $kelas = Kelas::find($id);
        return response()->json($kelas);
    }

    public function ubah(Request $req)
    {
        $kelas = Kelas::find($req->get('id'));
        $validate = $req->validate([
            'nama' => 'required|max:255',
            'jurusan' =>'required',
        ]);
        $kelas->nama = $req->get('nama');
        $kelas->jurusan = $req->get('jurusan');
        $kelas->save();
        $notification = array(
            'message' => 'Data Kelas berhasil diubah', 'alert-type' => 'success'
        );
        return redirect()->route('kelas')->with($notification);

    }

    public function hapus($id) {
        $kelas = Kelas::find($id);
        $kelas->delete();
        $success = true;
        $message = "Data Kelas berhasil dihapus";
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
}

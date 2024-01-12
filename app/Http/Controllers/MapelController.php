<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MapelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $mapel = Mapel::All();
        $namaJurusan = Jurusan::all();
        return view('mapel', compact('mapel', 'namaJurusan'));
    }

    public function submit(Request $req)
    {
        $validate = $req->validate([
            'nama' => 'required|max:255',
            'jurusan' =>'required',
        ]);
        $mapel = new Mapel;
        $mapel->nama = $req->get('nama');
        $mapel->jurusan = $req->get('jurusan');
        $mapel->save();
        $notification = array(
            'message' =>'Data Mata Pelajaran berhasil ditambahkan', 'alert-type' =>'success'
        );
        return redirect()->route('mapel')->with($notification);
    }

    public function getDataMapel($id)
    {
        $mapel = Mapel::find($id);
        return response()->json($mapel);
    }

    public function ubah(Request $req)
    {
        $mapel = Mapel::find($req->get('id'));
        $validate = $req->validate([
            'nama' => 'required|max:255',
            'jurusan' =>'required',
        ]);
        $mapel->nama = $req->get('nama');
        $mapel->jurusan = $req->get('jurusan');
        $mapel->save();
        $notification = array(
            'message' => 'Data Mata Pelajaran berhasil diubah', 'alert-type' => 'success'
        );
        return redirect()->route('mapel')->with($notification);

    }

    public function hapus($id) {
        $mapel = Mapel::find($id);
        $mapel->delete();
        $success = true;
        $message = "Data Mata Pelajaran berhasil dihapus";
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
}

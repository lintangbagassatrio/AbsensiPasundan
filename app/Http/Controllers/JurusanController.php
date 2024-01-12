<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JurusanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $jurusan = Jurusan::All();
        return view('jurusan', compact('jurusan'));
    }

    public function submit(Request $req)
    {
        $validate = $req->validate([
            'nama' => 'required|max:255',
        ]);
        $jurusan = new Jurusan;
        $jurusan->nama = $req->get('nama');
        $jurusan->save();
        $notification = array(
            'message' =>'Data Jurusan berhasil ditambahkan', 'alert-type' =>'success'
        );
        return redirect()->route('jurusan')->with($notification);
    }

    public function getDataJurusan($id)
    {
        $jurusan = Jurusan::find($id);
        return response()->json($jurusan);
    }

    public function ubah(Request $req)
    {
        $jurusan = Jurusan::find($req->get('id'));
        $validate = $req->validate([
            'nama' => 'required|max:255',
        ]);
        $jurusan->nama = $req->get('nama');
        $jurusan->save();
        $notification = array(
            'message' => 'Data Jurusan berhasil diubah', 'alert-type' => 'success'
        );
        return redirect()->route('jurusan')->with($notification);

    }

    public function hapus($id) {
        $jurusan = Jurusan::find($id);
        $jurusan->delete();
        $success = true;
        $message = "Data Jurusan berhasil dihapus";
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
}

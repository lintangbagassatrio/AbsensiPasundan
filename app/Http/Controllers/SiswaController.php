<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Jurusan;
use App\Imports\SiswaImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class SiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $siswa = Siswa::All();
        $namaKelas = Kelas::All();
        $namaJurusan = Jurusan::All();
        return view('siswa', compact('siswa', 'namaKelas', 'namaJurusan'));
    }

    public function submit(Request $req)
    {
        $validate = $req->validate([
            'name' => 'required|max:255',
            'lahir' =>'required',
            'induk' =>'required',
            'nisn' =>'required',
            'kelas' =>'required',
            'jurusan' =>'required',
            'alamat' =>'required',
        ]);
        $siswa = new Siswa;
        $siswa->name = $req->get('name');
        $siswa->lahir = $req->get('lahir');
        $siswa->nisn = $req->get('nisn');
        $siswa->induk = $req->get('induk');
        $siswa->kelas = $req->get('kelas');
        $siswa->jurusan = $req->get('jurusan');
        $siswa->alamat = $req->get('alamat');
        $siswa->save();
        $notification = array(
            'message' =>'Data Siswa berhasil ditambahkan', 'alert-type' =>'success'
        );
        return redirect()->route('siswa')->with($notification);
    }

    public function getDataSiswa($id)
    {
        $siswa = Siswa::find($id);
        return response()->json($siswa);
    }

    public function ubah(Request $req)
    {
        $siswa = Siswa::find($req->get('id'));
        $validate = $req->validate([
            'name' => 'required|max:255',
            'lahir' =>'required',
            'induk' =>'required',
            'nisn' =>'required',
            'kelas' =>'required',
            'jurusan' =>'required',
            'alamat' =>'required',
        ]);
        $siswa->name = $req->get('name');
        $siswa->lahir = $req->get('lahir');
        $siswa->nisn = $req->get('nisn');
        $siswa->induk = $req->get('induk');
        $siswa->kelas = $req->get('kelas');
        $siswa->jurusan = $req->get('jurusan');
        $siswa->alamat = $req->get('alamat');
        $siswa->save();
        $notification = array(
            'message' => 'Data Siswa berhasil diubah', 'alert-type' => 'success'
        );
        return redirect()->route('siswa')->with($notification);

    }

    public function hapus($id) {
        $siswa = Siswa::find($id);
        $siswa->delete();
        $success = true;
        $message = "Data Siswa berhasil dihapus";
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

    public function importexcel(Request $req){
        $data = $req->file('file');
        $namafile = $data->getClientOriginalName();
        $data->move('SiswaData',  $namafile);
        Excel::import(new  SiswaImport, \public_path('/SiswaData/'.$namafile));
        return \redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function guru()
    {
        $user = Auth::user();
        $laporan = Absensi::where('kelas', $user->wali_kelas)->get();
        return view('laporan_walikelas', compact('user', 'laporan'));
    }

    public function admin()
    {
        $user = Auth::user();
        $laporan = Absensi::All();
        return view('laporan_admin', compact('user', 'laporan'));
    }

    public function getDataLaporan($id)
    {
        $laporan = Absensi::find($id);
        return response()->json($laporan);
    }

    public function ubah(Request $req)
    {
        $siswa = Absensi::find($req->get('id'));
        $siswa->keterangan = $req->get('keterangan');
        $siswa->save();
        $notification = array(
            'message' => 'Absen Siswa berhasil diubah', 'alert-type' => 'success'
        );
        return redirect()->route('laporan.guru')->with($notification);
    }
}

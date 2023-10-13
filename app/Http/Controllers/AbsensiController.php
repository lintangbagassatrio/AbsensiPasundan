<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Siswa;
use App\Models\Absensi;
use App\Models\Penjadwalan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $user = Auth::user();
        $penjadwalan = Penjadwalan::All();
        $item = Penjadwalan::where('guru', $user->name)->get();

        return view('absensi', compact('penjadwalan', 'item'));
    }

    public function absen($id)
    {
        $user = Auth::user();
        $penjadwalan = Penjadwalan::find($id);
        $item = Siswa::where('kelas', $penjadwalan->kelas)->get();

        return view('absen', compact('penjadwalan', 'item'));
    }

    public function submit(Request $request)
    {
        foreach ($request->input as $key => $value) {
            $absensi = new Absensi;
            $absensi->induk = $value['induk'];
            $absensi->nisn = $value['nisn'];
            $absensi->siswa = $value['name'];
            if ($value['keterangan'] === "Pilih") {
                $absensi->keterangan = NULL;
            } else {
                $absensi->keterangan = $value['keterangan'];
            }
            $absensi->pelajaran = $request->get('pelajaran');
            $absensi->kelas = $request->get('kelas');
            $absensi->waktu_mulai = $request->get('waktu_mulai');
            $absensi->waktu_selesai = $request->get('waktu_selesai');
            $absensi->guru = $request->get('guru');
            $absensi->save();
        }
        $notification = array(
            'message' =>'Absensi Berhasil', 'alert-type' =>'success'
        );
        return redirect()->route('absensi')->with($notification);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $guru = User::All();
        return view('guru', compact('guru'));
    }

    public function submit(Request $req)
    {
        $validate = $req->validate([
            'name' => 'required|max:255',
            'username' =>'required',
            'password' =>'required',
            'email' =>'required',
            'lahir' =>'required',
            'nip' =>'required',
            'nuptk' =>'required',
            'agama' =>'required',
            'pendidikan' =>'required',
            'jabatan' =>'required',
        ]);
        $guru = new User;
        $guru->name = $req->get('name');
        $guru->username = $req->get('username');
        $guru->password = Hash::make($req->get('password'));
        $guru->email = $req->get('email');
        $guru->lahir = $req->get('lahir');
        $guru->nip = $req->get('nip');
        $guru->nuptk = $req->get('nuptk');
        $guru->agama = $req->get('agama');
        $guru->pendidikan = $req->get('pendidikan');
        $guru->jabatan = $req->get('jabatan');
        if ($req->get('wali_kelas') != 'Opsional'){
            $guru->wali_kelas = $req->get('wali_kelas');
        }elseif ($req->get('wali_kelas') == 'Opsional'){
            $guru->wali_kelas = 'Tidak Punya';
        }
        $guru->roles_id = 2;
        $guru->save();
        $notification = array(
            'message' =>'Data Guru berhasil ditambahkan', 'alert-type' =>'success'
        );
        return redirect()->route('guru')->with($notification);
    }

    public function getDataGuru($id)
    {
        $guru = User::find($id);
        return response()->json($guru);
    }

    public function ubah(Request $req)
    {
        $guru = User::find($req->get('id'));
        $validate = $req->validate([
            'name' => 'required|max:255',
            'username' =>'required',
            'email' =>'required',
            'lahir' =>'required',
            'nip' =>'required',
            'nuptk' =>'required',
            'agama' =>'required',
            'pendidikan' =>'required',
            'jabatan' =>'required',
        ]);
        $guru->name = $req->get('name');
        $guru->username = $req->get('username');
        $guru->email = $req->get('email');
        $guru->lahir = $req->get('lahir');
        $guru->nip = $req->get('nip');
        $guru->nuptk = $req->get('nuptk');
        $guru->agama = $req->get('agama');
        $guru->pendidikan = $req->get('pendidikan');
        $guru->jabatan = $req->get('jabatan');
        if ($req->get('wali_kelas') != 'Opsional'){
            $guru->wali_kelas = $req->get('wali_kelas');
        }elseif ($req->get('wali_kelas') == 'Opsional'){
            $guru->wali_kelas = 'Tidak Punya';
        }
        $guru->save();
        $notification = array(
            'message' => 'Data Guru berhasil diubah', 'alert-type' => 'success'
        );

        return redirect()->route('guru')->with($notification);
    }
    public function hapus($id) {
        $guru = User::find($id);
        $guru->delete();
        $success = true;
        $message = "Data Guru berhasil dihapus";
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

}

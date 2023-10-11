<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $total_siswa = Siswa::count();
        $total_guru = User::where('roles_id', 2)->count();
        $total_kelas = User::whereNotNull('wali_kelas')->count();

        return view('home', compact('user', 'total_siswa', 'total_guru', 'total_kelas'));
    }
}

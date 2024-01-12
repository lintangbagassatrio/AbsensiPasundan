<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    public static function getDataAbsensis(){
        $absensis = Absensi::all();

        $tabungan_filter = [];

        $no = 1;
        for($i=0; $i < $absensis->count(); $i++){
            $tabungan_filter[$i]['No'] = $no++;
            $tabungan_filter[$i]['Pelajaran'] = $absensis[$i]->pelajaran;
            $tabungan_filter[$i]['Kelas'] = $absensis[$i]->kelas;
            $tabungan_filter[$i]['Waktu Mulai'] = $absensis[$i]->waktu_mulai;
            $tabungan_filter[$i]['Waktu Selesai'] = $absensis[$i]->waktu_selesai;
            $tabungan_filter[$i]['Guru'] = $absensis[$i]->guru;
            $tabungan_filter[$i]['Siswa'] = $absensis[$i]->siswa;
            $tabungan_filter[$i]['Induk'] = $absensis[$i]->induk;
            $tabungan_filter[$i]['Nisn'] = $absensis[$i]->nisn;
            $tabungan_filter[$i]['Keterangan'] = $absensis[$i]->keterangan;
            $tabungan_filter[$i]['Dibuat'] = $absensis[$i]->created_at;
        }

        return $tabungan_filter;
    }
}

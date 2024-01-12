<?php

namespace App\Exports;

use App\Models\Absensi;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromCollection;

class AbsensiExport implements FromArray, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Absensi::all();
    // }

    public function array(): array{
        return Absensi::getDataAbsensis();
    }

    public function headings(): array{
        return [
            'No',
            'Pelajaran',
            'Kelas',
            'Waktu Mulai',
            'Waktu Selesai',
            'Guru',
            'Siswa',
            'Induk',
            'Nisn',
            'Keterangan',
            'Dibuat'
        ];
    }
}

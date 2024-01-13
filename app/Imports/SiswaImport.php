<?php

namespace App\Imports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements WithHeadingRow, ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Siswa([
            'induk' => $row['induk'],
            'nisn' => $row['nisn'],
            'name' => $row['name'],
            'kelas' => $row['kelas'],
            'jurusan' => $row['jurusan'],
            'lahir' => $row['lahir'],
            'alamat' => $row['alamat'],
        ]);
    }
}

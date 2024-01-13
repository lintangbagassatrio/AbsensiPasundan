<?php

namespace App\Imports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;

class SiswaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Siswa([
            'induk' => $row['1'],
            'nisn' => $row['2'],
            'name' => $row['3'],
            'kelas' => $row['4'],
            'jurusan' => $row['5'],
            'lahir' => $row['6'],
            'alamat' => $row['7'],
        ]);
    }
}

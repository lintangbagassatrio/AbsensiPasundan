<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GuruImport implements WithHeadingRow, ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'name' => $row['name'],
            'email' => $row['email'],
            'username' => $row['username'],
            'password' => Hash::make($row['password']),
            'lahir' => $row['lahir'],
            'nip' => $row['nip'],
            'nuptk' => $row['nuptk'],
            'agama' => $row['agama'],
            'pendidikan' => $row['pendidikan'],
            'jabatan' => $row['jabatan'],
            'wali_kelas' => $row['wali_kelas'],
            'roles_id' => 2 ,
        ]);
    }
}

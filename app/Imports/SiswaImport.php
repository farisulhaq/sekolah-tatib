<?php

namespace App\Imports;

use App\Models\user;
use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        if (!(Siswa::whereNis($row['nis'])->first())) {
            $user = User::create([
                'name' => $row['nis'],
                'email' => trim($row['nis']) . '@siswa.id',
                'password' => $row['nis'],
            ]);

            $user->user_role()->create([
                'role_id' => 3,
            ]);

            $user->siswa()->create([
                'jenis_kelamin_id' => $row['jenis_kelamin'],
                'nis' => $row['nis'],
                'nama' => $row['nama'],
                'tanggal_lahir' => date('Y-m-d', strtotime($row['tanggal_lahir'])),
                'alamat' => $row['alamat']
            ]);

            return $user;
        }
    }
}

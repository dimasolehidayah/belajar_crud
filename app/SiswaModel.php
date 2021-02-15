<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SiswaModel extends Model
{
    public function allData()
    {
        return DB::table('tbl_siswa')
        ->leftJoin('tbl_kelas', 'tbl_kelas.id_kelas', '=', 'tbl_siswa.id_kelas')
        ->get();
    }
}

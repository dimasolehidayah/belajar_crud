<?php

namespace App;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GuruModel extends Model
{
    public function allData()
    {
        return DB::table('tbl_guru')->get();
    }
    public function detailData($id)
    {
        return DB::table('tbl_guru')->where('id', $id)->first();
    }
    public function tambahData($data)
    {
        DB::table('tbl_guru')->insert($data);
    }
    public function editData($id ,$data)
    {
        DB::table('tbl_guru')->where('id' , $id)->update($data);
    }
    public function deleteData($id)
    {
        DB::table('tbl_guru')->where('id' , $id)->delete();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GuruModel;

class GuruController extends Controller
{
    public function __construct()
    {
        $this->GuruModel = new GuruModel();
        $this->middleware('auth');
    }
    public function index()
    {
        $data = [
            'guru' => $this->GuruModel->allData(),
        ];
        return view('v_guru', $data);
    }
    public function detail($id)
    {
        if (!$this->GuruModel->detailData($id)) {
            abort(404);
        }
        $data = [
            'guru' => $this->GuruModel->detailData($id),
        ];
        return view('v_detailguru', $data);
    }
    public function add()
    {
        return view('v_addguru');
    }
    public function insert()
    {
        Request()->validate([
            'nik' => 'required|unique:tbl_guru,nik|min:4|max:11',
            'nama' => 'required',
            'keahlian' => 'required',
            'alamat' => 'required',
            'foto' => 'required|mimes:jpg,jpeg,bmp,png',

        ], [
            'nik.required' => 'wajib di isi',
            'nik.unique' => 'Nik sudah terdaftar',
            'nik.min' => 'Min 4 Karakter',
            'nik.max' => 'Max 11 Karakter',
            'nama.required' => 'wajib di isi',
            'keahlian.required' => 'wajib di isi',
            'alamat.required' => 'wajib di isi',
            'foto.required' => 'wajib di isi',
            'foto.mimes' => 'ekstensi harus jpg,jpeg,bmp,png',
        ]);
        //jika validasi tidak ada maka lakukan simpan data
        //upload gambar/foto
        $file = Request()->foto;
        $fileName = Request()->nik . '.' . $file->extension();
        $file->move(public_path('foto_guru'), $fileName);

        $data = [
            'nik' => Request()->nik,
            'nama' => Request()->nama,
            'keahlian' => Request()->keahlian,
            'alamat' => Request()->alamat,
            'foto' => $fileName,
        ];

        $this->GuruModel->tambahData($data);
        return redirect()->route('guru')->with('pesan', 'Data Berhasil Ditambahkan');
    }
    public function edit($id)
    {
        if (!$this->GuruModel->detailData($id)) {
            abort(404);
        }
        $data = [
            'guru' => $this->GuruModel->detailData($id),
        ];
        return view('v_edit', $data);
    }
    public function update($id)
    {
        Request()->validate([
            'nik' => 'required|min:4|max:11',
            'nama' => 'required',
            'keahlian' => 'required',
            'alamat' => 'required',
            'foto' => 'mimes:jpg,jpeg,bmp,png',

        ], [
            'nik.required' => 'wajib di isi',
            'nik.min' => 'Min 4 Karakter',
            'nik.max' => 'Max 11 Karakter',
            'nama.required' => 'wajib di isi',
            'keahlian.required' => 'wajib di isi',
            'alamat.required' => 'wajib di isi',
            'foto.mimes' => 'ekstensi harus jpg,jpeg,bmp,png',
        ]);
        //jika validasi tidak ada maka lakukan simpan data
        if (Request()->foto <> "") {
            //jika ingin ganti foto
            //upload gambar/foto
            $file = Request()->foto;
            $fileName = Request()->nik . '.' . $file->extension();
            $file->move(public_path('foto_guru'), $fileName);

            $data = [
                'nik' => Request()->nik,
                'nama' => Request()->nama,
                'keahlian' => Request()->keahlian,
                'alamat' => Request()->alamat,
                'foto' => $fileName,
            ];

            $this->GuruModel->editData($id, $data);
        } else {
            //jika tidak ingin ganti foto
            $data = [
                'nik' => Request()->nik,
                'nama' => Request()->nama,
                'keahlian' => Request()->keahlian,
                'alamat' => Request()->alamat,
            ];
        }
        return redirect()->route('guru')->with('pesan', 'Data Berhasil Diupdate');
    }
    public function delete($id)
    {
        //hapus foto di dalam folder
        $guru =  $this->GuruModel->detailData($id);
        if ($guru->foto <> "") {
            unlink(public_path('foto_guru') .'/'. $guru->foto);
        }

        $this->GuruModel->deleteData($id);
        return redirect()->route('guru')->with('pesan', 'Data Berhasil Hapus');
    }
}

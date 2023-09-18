<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class UserController extends BaseController
{
    public function profile($nama = "", $kelas = "", $npm = "")
    {
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,
            'npm' => $npm,
        ];
        return view('profil', $data);
        
    }

    public function create(){
        // dd($this->request->getVar());
        // $data = [
        //     'nama' => $nama,
        //     'kelas' => $kelas,
        //     'npm' => $npm,
        // ];
        return view('create_user');
    }

    public function store(){
        // dd($this->request->getVar());
        $data = [
            'nama' => $this->request->getVar('nama'),
            'kelas' => $this->request->getVar('kelas'),
            'npm' => $this->request->getVar('npm'),
        ];
        return view('profil', $data);
    }
}

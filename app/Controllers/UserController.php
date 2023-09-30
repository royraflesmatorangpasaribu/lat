<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\KelasModel;
use App\Controllers\BaseController;



class UserController extends BaseController
{
    public $userModel;
    public $kelasModel;

    protected $helpers=['Form'];
    public function index()
    {
        $data = [
            'title' => 'List User',
            'users' => $this->userModel->getUser(),
        ];

        return view('list_user', $data);
    }

    public function __construct(){
        $this->userModel = new UserModel();
        $this->kelasModel = new KelasModel();
    }


    public function profile($nama = "", $kelas = "", $npm = "")
    {
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,
            'npm' => $npm
        ];
        return view('profil', $data);
        
    }

    public function create()
    {
        // membuat opsi kelas sesuai dengan data base
        // $kelasModel = new kelasModel();
        $kelas = $this->kelasModel->getKelas();

        $data = [
           'title' => 'Create User',
           'kelas' => $kelas,
        ];

        return view('create_user', $data); 
    }

    public function store(){
        // dd($this->request->getVar());  // test data masuk or no

        // agar tampilan di store kelas terpanggil A, B, C, D
        // $kelasModel = new KelasModel();
        if($this->request->getVar('kelas') != ''){
            $kelas_select = $this->kelasModel->where('id', $this->request->getVar('kelas'))->first();
            $nama_kelas = $kelas_select['nama_kelas'];
        }
        else{
            $nama_kelas= '';
        }

        // validasi
        if(!$this->validate([
            'nama' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => '{field} harus di isi!!',
                    'alpha_space' => '{field} isi dengan huruf dan spasi!!'
                ]
            ],
            'npm' => [
                'rules' => 'required|is_unique[user.npm]',
                'errors' => [
                    'required' => '{field} harus di isi!!',
                    'is_unique' => '{field} sudah terdaftar!!'
                ]
            ],
            'kelas' => [
                'rules' => 'required',
                'errors' => [
                'required' => '{field} harus di isi!!',
                ]
            ],
            // 'nama' => 'required|alpha_space',
            // 'npm' => 'required|is_unique[user.npm]',
            // 'kelas' => 'required'
        ])){
            // dd($validation);
            session()->setFlashdata('nama_kelas');
            return redirect()->back()->withInput()->with('nama_kelas', $nama_kelas);
        }
       
        // $userModel = new UserModel();

        $this->userModel->saveUser ([
            'nama' => $this->request->getVar('nama'),
            'id_kelas' => $this->request->getVar('kelas'),
            'npm' => $this->request->getVar('npm'),
        ]);

        // digunakan untuk menampilkan data ke halaman profile
        $data = [
            'title' => 'Profile',
            'nama' => $this->request->getVar('nama'),
            'kelas' => $nama_kelas,
            'npm' => $this->request->getVar('npm'),
        ];
        // return view('profil', $data);

        // disini di redirect agar setelah mengisi form create user langsung menuju halaman list user
        return redirect()->to ('/user');
    }

}
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

    public function __construct(){
        $this->userModel = new UserModel();
        $this->kelasModel = new KelasModel();
    }

    public function index()
    {
        $data = [
            'title' => 'List User',
            'users' => $this->userModel->getUser(),
        ];

        return view('list_user', $data);
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
        // Membuat data kelas sesuai dengan yang ada di database
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

        $path = 'assets/uploads/img/';
        $foto = $this->request->getFile('foto');
        $name = $foto->getRandomName();

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
            'foto' => [
                'rules' => 'uploaded[foto]|is_image[foto]',
                'errors' => [
                    'uploaded' => '{field} harus di isi!!',
                    'is_image' => '{field} harus di isi dengan gambar!'
                ]
            ],
            // 'foto' => 'uploaded[foto]|is_image[foto]'
            // 'nama' => 'required|alpha_space',
            // 'npm' => 'required|is_unique[user.npm]',
            // 'kelas' => 'required'
        ])){
            // dd($validation);
            session()->setFlashdata('nama_kelas');
            return redirect()->back()->withInput()->with('nama_kelas', $nama_kelas);
        }

        if($foto->move($path, $name)) {
            $foto = base_url($path.$name);
        }
       
        // $userModel = new UserModel();

        $this->userModel->saveUser ([
            'nama' => $this->request->getVar('nama'),
            'id_kelas' => $this->request->getVar('kelas'),
            'npm' => $this->request->getVar('npm'),
            'foto' => $foto
        ]);
        
        //agar setelah melakukan save data, user di redirect ke halaman /user tanpa perlu menampilkan halaman profile
        return redirect()->to ('/user');

        // digunakan jika ingin untuk menampilkan data ke halaman profile
        // $data = [
        //     'title' => 'Profile',
        //     'nama' => $this->request->getVar('nama'),
        //     'kelas' => $nama_kelas,
        //     'npm' => $this->request->getVar('npm'),
        // ];
        // return view('profile', $data);
    }
    public function show($id){
        $user = $this->userModel->getUser($id);

        $data = [
            'title' => 'Profile',
            'user'  => $user,
        ];
        
        return view('profil', $data);
    }

    public function edit($id){
        $user = $this->userModel->getUser($id);
        $kelas = $this->kelasModel->getKelas();

        $data = [
            'title' => 'Edit User',
            'user' => $user,
            'kelas' => $kelas,
        ];

        return view('edit_user', $data);
    }

    public function update($id){
        $path = 'assets/uploads/img/';
        $foto = $this->request->getFile('foto');
        
        $data = [
            'nama'      => $this->request->getVar('nama'),
            'id_kelas'  => $this->request->getVar('kelas'),
            'npm'       => $this->request->getVar('npm'),
        ];

        if($foto->isValid()){
            $name = $foto->getRandomName();

            if($foto->move($path, $name)){
                $foto_path = base_url($path . $name);
                $data['foto'] = $foto_path;
            }
        }

        $result = $this->userModel->updateUser($data, $id);

        if(!$result){
            return redirect()->back()->withInput()
                ->with('error', 'Gagal Menyimpan data');
        }

        return redirect()->to(base_url('/user'));
    }

    public function destroy($id){
        $result = $this->userModel->deleteUser($id);
        if(!$result){
            return redirect()->back()->with('error', 'Gagal menghapus data');
        }
        return redirect()->to(base_url('/user'))
            ->with('success', 'Berhasil menghapus data');
    }

}
<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'user';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama', 'npm', 'id_kelas', 'foto'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function saveUser($data){
        $this->insert($data);
    }

    // mengembalikan seluruh data user dengan join ke tabel kelas
    public function getUser($id = null){
        if($id != null){

            return $this->join('kelas', 'kelas.id=user.id_kelas')
                ->select('user.*, kelas.nama_kelas')
                ->orderBy('user.id')
                ->find($id);
        }
        return $this->join('kelas', 'kelas.id=user.id_kelas')
            ->select('user.*, kelas.nama_kelas')
            ->orderBy('user.id')
            ->findAll();
    }

    public function updateUser($data, $id){
        return $this->update($id, $data);
    }

    public function deleteUser($id){
        return $this->delete($id);
    }

}
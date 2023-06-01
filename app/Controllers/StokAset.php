<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use Config\Database;

class StokAset extends BaseController
{
    use ResponseTrait;
    protected $db;
    public function __construct()
    {
        $this->db = Database::connect();
    }
    public function index()
    {
        //
    }

    public function create()
    {
        $data = [
            'nama' => $this->request->getVar('nama'),
            'ukuran' => $this->request->getVar('ukuran'),
            'jumlah' => $this->request->getVar('jumlah'),
            'created_at' => time()
        ];

        $query = $this->db->table('stok_aset')
            ->insert($data);
        if ($query) {
            return $this->respondCreated([
                "msg" => "success",
                "data" => $data,
                "code" => 201
            ]);
        } else {
            return $this->fail([
                "msg" => "Error",
                "code" => 400
            ], 400);
        }
    }

    public function read()
    {
        $query = $this->db->table('stok_aset')
            ->get()
            ->getResultArray();

        return $this->respondCreated([
            "msg" => "success",
            "code" => 201,
            "data" => $query
        ]);
    }

    public function edit($id)
    {
        $nama = $this->request->getVar('nama');
        $ukuran = $this->request->getVar('ukuran');
        $jumlah = $this->request->getVar('jumlah');
        $updated_at = time();

        $query = $this->db->table('stok_aset')
            ->where('id', $id)
            ->set('nama', $nama)
            ->set('ukuran', $ukuran)
            ->set('jumlah', $jumlah)
            ->set('updated_at', $updated_at)
            ->update();

        return $this->respondCreated([
            "msg" => "success",
            "code" => 201,
            "data" => $query
        ]);
    }

    public function delete($id)
    {
        $query = $this->db->table('stok_aset')
            ->where('id', $id)
            ->delete();

        return $this->respondCreated([
            "msg" => "success",
            "code" => 201,
            "data" => $query
        ]);
    }
}
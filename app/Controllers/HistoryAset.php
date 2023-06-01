<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use Config\Database;

class HistoryAset extends BaseController
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
            'nama_aset' => $this->request->getVar('nama_aset'),
            'ukuran' => $this->request->getVar('ukuran'),
            'info' => $this->request->getVar('info'),
            'created_at' => time()
        ];

        $query = $this->db->table('history_aset')
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
        $query = $this->db->table('history_aset')
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
        $nama_aset = $this->request->getVar('nama_aset');
        $ukuran = $this->request->getVar('ukuran');
        $info = $this->request->getVar('info');

        $query = $this->db->table('history_aset')
            ->where('id', $id)
            ->set('nama_aset', $nama_aset)
            ->set('ukuran', $ukuran)
            ->set('info', $info)
            ->set('updated_at', time())
            ->update();

        return $this->respondCreated([
            "msg" => "success",
            "code" => 201,
            "data" => $query
        ]);
    }

    public function delete($id)
    {
        $query = $this->db->table('history_aset')
            ->where('id', $id)
            ->delete();

        return $this->respondCreated([
            "msg" => "success",
            "code" => 201,
            "data" => $query
        ]);
    }
}
<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use Config\Database;

class HistoryPengambilan extends BaseController
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
            'nama_user' => $this->request->getVar('nama_user'),
            'divisi' => $this->request->getVar('divisi'),
            'departemen' => $this->request->getVar('departemen'),
            'nip' => $this->request->getVar('nip'),
            'created_at' => time()
        ];

        $query = $this->db->table('history_pengambilan')
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
        $query = $this->db->table('history_pengambilan')
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
        $nama_user = $this->request->getVar('nama_user');
        $divisi = $this->request->getVar('divisi');
        $departemen = $this->request->getVar('departemen');
        $nip = $this->request->getVar('nip');
        $updated_at = time();

        $query = $this->db->table('history_pengambilan')
            ->where('id', $id)
            ->set('nama_aset', $nama_aset)
            ->set('nama_user', $nama_user)
            ->set('divisi', $divisi)
            ->set('departemen', $departemen)
            ->set('nip', $nip)
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
        $query = $this->db->table('history_pengambilan')
            ->where('id', $id)
            ->delete();

        return $this->respondCreated([
            "msg" => "success",
            "code" => 201,
            "data" => $query
        ]);
    }
}
<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use Config\Database;


class Departemen extends BaseController
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
        $checkName = $this->db->table('departemen')
            ->where('nama', $this->request->getVar('nama'))
            ->get()
            ->getResultArray();

        if (empty($checkName)) {
            $data = [
                'nama' => $this->request->getVar('nama'),
                'divisi_id' => $this->request->getVar('divisi_id'),
            ];

            $query = $this->db->table('departemen')
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

        return $this->respondCreated([
            "msg" => "Nama departemen already exists!",
            "code" => 409
        ]);
    }

    public function read()
    {
        $query = $this->db->table('departemen')
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
        $divisi_id = $this->request->getVar('divisi_id');

        $query = $this->db->table('departemen')
            ->where('id', $id)
            ->set('nama', $nama)
            ->set('divisi_id', $divisi_id)
            ->update();

        return $this->respondCreated([
            "msg" => "success",
            "code" => 201,
            "data" => $query
        ]);
    }

    public function delete($id)
    {
        $query = $this->db->table('departemen')
            ->where('id', $id)
            ->delete();

        return $this->respondCreated([
            "msg" => "success",
            "code" => 201,
            "data" => $query
        ]);
    }
}
<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use Config\Database;

class TalentProgram extends BaseController
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
            'created_at' => time()
        ];

        $query = $this->db->table('talent_program')
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
        $query = $this->db->table('talent_program')
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
        $updated_at = time();

        $query = $this->db->table('talent_program')
            ->where('id', $id)
            ->set('nama', $nama)
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
        $query = $this->db->table('talent_program')
            ->where('id', $id)
            ->delete();

        return $this->respondCreated([
            "msg" => "success",
            "code" => 201,
            "data" => $query
        ]);
    }
}
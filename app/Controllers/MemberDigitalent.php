<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use Config\Database;

class MemberDigitalent extends BaseController
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
            'email' => $this->request->getVar('email'),
            'divisi_id' => $this->request->getVar('divisi_id'),
            'departemen_id' => $this->request->getVar('departemen_id'),
            'nip' => $this->request->getVar('nip'),
            'perusahaan' => $this->request->getVar('perusahaan'),
            'created_at' => time()
        ];

        $query = $this->db->table('member_digitalent')
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
        $query = $this->db->table('member_digitalent')
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
        $email = $this->request->getVar('email');
        $divisi_id = $this->request->getVar('divisi_id');
        $departemen_id = $this->request->getVar('departemen_id');
        $nip = $this->request->getVar('nip');
        $perusahaan = $this->request->getVar('perusahaan');
        $updated_at = time();

        $query = $this->db->table('member_digitalent')
            ->where('id', $id)
            ->set('nama_aset', $nama)
            ->set('email', $email)
            ->set('divisi_id', $divisi_id)
            ->set('departemen_id', $departemen_id)
            ->set('nip', $nip)
            ->set('perusahaan', $perusahaan)
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
        $query = $this->db->table('member_digitalent')
            ->where('id', $id)
            ->delete();

        return $this->respondCreated([
            "msg" => "success",
            "code" => 201,
            "data" => $query
        ]);
    }
}

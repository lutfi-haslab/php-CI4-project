<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use Config\Database;

class MemberProgram extends BaseController
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
            'member_digitalent_id' => $this->request->getVar('member_digitalent_id'),
            'talent_program_id' => $this->request->getVar('talent_program_id'),
        ];

        $query = $this->db->table('member_program')
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
        $query = $this->db->table('member_program')
            ->join('member_digitalent', "member_program.member_digitalent_id = member_digitalent.id")
            ->join('talent_program', "member_program.talent_program_id = talent_program.id")
            ->select('member_digitalent.*, talent_program.nama as program')
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
        $member_digitalent_id = $this->request->getVar('member_digitalent_id');
        $talent_program_id = $this->request->getVar('talent_program_id');

        $query = $this->db->table('member_program')
            ->where('id', $id)
            ->set('member_digitalent_id', $member_digitalent_id)
            ->set('talent_program_id', $talent_program_id)
            ->update();

        return $this->respondCreated([
            "msg" => "success",
            "code" => 201,
            "data" => $query
        ]);
    }

    public function delete($id)
    {
        $query = $this->db->table('member_program')
            ->where('id', $id)
            ->delete();

        return $this->respondCreated([
            "msg" => "success",
            "code" => 201,
            "data" => $query
        ]);
    }
}
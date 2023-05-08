<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Home extends BaseController
{
    use ResponseTrait;

    public function __construct()
    {

    }
    public function index($id1, $id2)
    {
        echo $id2;
    }

    public function create()
    {
        $data = [
            'id' => uuid4(),
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'created_at' => time(),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
        ];

        $query = $this->db->table('users')
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


    public function login()
    {
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $query = $this->db->table('users')
            ->where('email', $email)
            ->limit(1)
            ->get();
        $result = $query->getResultArray();

        if (!empty($result)) {
            $verify_password = password_verify($password, $result[0]['password']);
            if ($verify_password) {
                $key = "hahahha";
                $payload = [
                    "iss" => "localhost",
                    "aud" => "localhost",
                    "data" => $result
                ];

                $jwt = JWT::encode($payload, getenv('JWT_SECRET'), 'HS256');
                return $this->respond([
                    "msg" => "User Login Successfully",
                    "code" => 200,
                    "jwt" => $jwt
                ]);
            }
        } else {
            return $this->respond([
                "msg" => "User Login Fail",
                "code" => 400
            ]);
        }
    }

    public function read()
    {
        $query = $this->db->table('users')
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
        $name = $this->request->getVar('name');
        $email = $this->request->getVar('email');

        $query = $this->db->table('users')
            ->where('id', $id)
            ->set('name', $name)
            ->set('email', $email)
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
        $query = $this->db->table('users')
            ->where('id', $id)
            ->delete();

        return $this->respondCreated([
            "msg" => "success",
            "code" => 201,
            "data" => $query
        ]);
    }
}
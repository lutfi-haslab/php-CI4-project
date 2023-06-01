<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use Firebase\JWT\JWT;
use Config\Database;

class User extends BaseController
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
        $checkName = $this->db->table('users')
            ->where('name', $this->request->getVar('name'))
            ->get()
            ->getResultArray();
        $checkEmail = $this->db->table('users')
            ->where('email', $this->request->getVar('email'))
            ->get()
            ->getResultArray();

        if (empty($checkName) && empty($checkEmail)) {
            $data = [
                'name' => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'roles' => 1,
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

        return $this->respondCreated([
            "msg" => "User exist and not craeted, check name or email!",
            "code" => 409,
            "name" => $checkName,
            "email" => $checkEmail
        ]);
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
            ->join('roles', 'roles.id = users.roles')
            ->select('users.id, users.name, users.email, users.created_at, updated_at,roles.role')
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
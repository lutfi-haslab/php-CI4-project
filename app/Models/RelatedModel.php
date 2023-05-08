<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class RelatedModel extends Model
{
  protected $db;
  public function __construct()
  {
    $this->db = Database::connect();
  }

  public function get_one_to_one()
  {
    $query = $this->db->table('roles')
      ->join('colors', 'colors.id = roles.id')
      ->select('*')
      ->select('colors.*')
      ->get();

    $data['data'] = $query->getResult();
    return $data;
  }

  public function get_one_to_many()
  {
    $query = $this->db->table('test2')
      ->join('test1', 'test2.id = test1.test2_id')
      ->select('test2.id, test2.name_test2, test1.id as test1_id, test1.name_test1')
      ->get();

    $results = $query->getResultArray();

    $output = array();
    foreach ($results as $row) {
      $output[$row['id']]['id'] = $row['id'];
      $output[$row['id']]['name_test2'] = $row['name_test2'];
      $output[$row['id']]['test1'][] = array('id' => $row['test1_id'], 'name_test1' => $row['name_test1']);
    }

    $data['data'] = array_values($output);
    return $data;
  }
  public function get_many_to_many()
  {
    $query = $this->db->table('roles_users')
      ->join('roles', 'roles.id = roles_users.role_id')
      ->join('user_tests', 'user_tests.id = roles_users.user_id')
      ->select('*')
      ->select('roles.*')
      ->select('user_tests.*')
      ->get();

    $data['data'] = $query->getResult();
    return $data;
  }
}
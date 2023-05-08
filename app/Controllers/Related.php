<?php

namespace App\Controllers;

use App\Models\RelatedModel;

class Related extends BaseController
{

  private $model;
  public function __construct()
  {
    $this->model = new RelatedModel();
  }

  // Contoh One to One
  public function OneToOne()
  {
    $result = $this->model->get_one_to_one();

    return $this->response->setJSON($result);
  }

  // Contoh One to Many
  public function OneToMany()
  {
    $result = $this->model->get_one_to_many();

    return $this->response->setJSON($result);
  }

  // Contoh Many to Many
  public function ManyToMany()
  {
    $result = $this->model->get_many_to_many();

    return $this->response->setJSON($result);
  }
}
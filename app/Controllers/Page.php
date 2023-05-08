<?php

namespace App\Controllers;

class Page extends BaseController
{
  public function index()
  {
    $this->cachePage(1);
    return view('index');
  }
  public function table()
  {
    $this->cachePage(1);
    return view('table');
  }
  public function sign()
  {
    $this->cachePage(1);
    return view('dev/sign');
  }
}
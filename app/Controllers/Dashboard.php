<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
  public function index()
  {
    $session = session();

    $data = [
      'title' => 'Dashboard - Ebook',
      'user_name' => $session->get('user_name'),
      'user_email' => $session->get('user_email'),
      'user_role' => $session->get('user_role'),
    ];

    return view('pages/dashboard', $data);
  }
}

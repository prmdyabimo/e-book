<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Login extends BaseController
{
  protected $usersModel;

  public function __construct()
  {
    $this->usersModel = new UsersModel();
  }

  public function index()
  {
    session();

    helper(['form']);
    
    $data = [
      'title' => 'Login - Ebook'
    ];

    return view('pages/login', $data);
  }

  public function auth()
  {
    $session = session();

    $email = $this->request->getVar('user_email');
    $password = $this->request->getVar('user_password');

    $data = $this->usersModel->where('user_email', $email)->first();

    if ($data) {
      $pass = $data['user_password'];
      $verify_pass = password_verify($password, $pass);

      if ($verify_pass) {
        $ses_data = [
          'user_id'      => $data['user_id'],
          'user_name'    => $data['user_name'],
          'user_email'   => $data['user_email'],
          'user_role'    => $data['user_role'],
          'logged_in'    => true
        ];

        $session->set($ses_data);
        return redirect()->to(base_url('/dashboard'));
      } else {
        $session->setFlashdata('msg-failed', 'Wrong Password');
        return redirect()->to(base_url('/login'));
      }
    } else {
      $session->setFlashdata('msg-failed', 'Email not found');
      return redirect()->to(base_url('/login'));
    }
  }

  public function logout()
  {
    $session = session();
    $session->destroy();
    return redirect()->to(base_url('/login'));
  }
}

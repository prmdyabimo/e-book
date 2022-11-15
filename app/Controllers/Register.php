<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Register extends BaseController
{
  public function index()
  {
    // session
    session();

    // include helper form
    helper(['form']);

    $data = [
      'title'       => 'Register - Ebook',
      'validation'  => \Config\Services::validation()
    ];

    return view('pages/register', $data);
  }

  public function save()
  {
    // include helper form
    helper(['form']);

    // rules validation
    $rules = [
      'user_name' => [
        'rules'   => 'required|min_length[3]|max_length[20]',
        'errors'  => [
          'required'    => 'Name is required',
          'min_length'  => 'Min Length 3 character',
          'max_length'  => 'Max Length 20 character'
        ]
      ],
      'user_email' => [
        'rules'    => 'required|valid_email|is_unique[tb_users.user_email]',
        'errors'   => [
          'required'    => 'Email is required',
          'valid_email' => 'Email is not valid',
          'is_unique'   => 'Email already used'
        ]
      ],
      'user_role' => [
        'rules'   => 'required',
        'errors'  => [
          'required' => 'Role is required'
        ]
      ],
      'user_password' => [
        'rules'       => 'required|max_length[12]|min_length[8]|alpha_numeric',
        'errors'      => [
          'required'      => 'Password is required',
          'max_length'    => 'Max Length 12 character',
          'min_length'    => 'Min Length 8 character',
          'alpha_numeric' => 'Password must consist of numbers and letters'
        ]
      ],
      'conf_password' => [
        'rules'       => 'matches[user_password]',
        'errors'      => 'Password does not match'
      ]
    ];

    if ($this->validate($rules)) {
      // UsersModel
      $usersModel = new UsersModel();

      // data to save
      $data = [
        'user_name'     => $this->request->getVar('user_name'),
        'user_email'    => $this->request->getVar('user_email'),
        'user_role'     => $this->request->getVar('user_role'),
        'user_password' => password_hash($this->request->getVar('user_password'), PASSWORD_DEFAULT)
      ];

      $usersModel->save($data);
      session()->setFlashdata('msg-success', 'You Have Successfully Registered');
      return redirect()->to(base_url('/login'));
    } else {
      return redirect()->to(base_url('/register'))->withInput();
    }
  }
}

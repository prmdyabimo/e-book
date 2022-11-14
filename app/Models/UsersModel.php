<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table            = 'tb_users';
    protected $primaryKey       = 'user_id';
    protected $allowedFields    = ['user_name', 'user_email', 'user_role', 'user_password'];

}

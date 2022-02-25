<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = "users";
    protected $DBGroup = 'default';
    protected $allowedFields = ['username', 'email', 'password'];
    protected $useTimestamps = true;
    protected $validationRules = [
        'name'     => 'required',
        'username'     => 'required|alpha_numeric|min_length[3]',
        'email'        => 'required|valid_email|is_unique[users.email]',
        'old_password' => 'required|verify',
        'password'     => 'required|min_length[8]',
        'pass_confirm' => 'required|matches[password]',
    ];
    protected $validationMessages = [];
    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];

    // Begin Transaction
    public function transBegin()
    {
        return $this->db->transBegin();
    }
    public function transRollback()
    {
        return $this->db->transRollback();
    }
    public function transCommit()
    {
        return $this->db->transCommit();
    }

    // Hash Password
    public function hashPassword($data)
    {
        $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        return $data;
    }

    public function authenticate($user)
    {
        $password = $user['password'];
        $user = $this->getWhere(['email' => $user['email']]);

        if ($user->resultID->num_rows > 0) {
            $user = $user->getRow();
            $verify = password_verify($password, $user->password);

            if ($verify) {
                return ['user_id' => $user->id, 'username' => $user->username, 'email' => $user->email, 'isLoggedIn' => true];
            } else {
                return false;
            }
        }

        return false;
    }
}
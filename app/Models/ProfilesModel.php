<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfilesModel extends Model
{
    protected $table = "profiles";
    protected $DBGroup = 'default';
    protected $allowedFields = ['user_id', 'name', 'address', 'city', 'state', 'country'];
    protected $useTimestamps = true;
    protected $validationRules = [
        'user_id' => 'required|is_unique[profiles.user_id]',
        'name'        => 'required',
    ];
    protected $validationMessages = [];
}
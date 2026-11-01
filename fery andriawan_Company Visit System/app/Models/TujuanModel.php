<?php

namespace App\Models;

use CodeIgniter\Model;

class TujuanModel extends Model
{
    protected $table = 'tujuan';
    protected $primaryKey = 'tujuan_id';
    protected $allowedFields = ['tujuan'];
}

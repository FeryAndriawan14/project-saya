<?php

namespace App\Models;

use CodeIgniter\Model;

class DepartemenModel extends Model
{
    protected $table = 'departemen';
    protected $primaryKey = 'department_id';
    protected $allowedFields = [
        'nama_departemen'
    ];

    // Optional: Add validation rules if needed
    
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class PengunjungModel extends Model
{
    protected $table = 'pengunjung';
    protected $primaryKey = 'visitor_id';
    protected $allowedFields = [
        'nama', 'email', 'perusahaan', 'department_id', 'tujuan_id', 
        'waktu_masuk', 'waktu_keluar', 'catatan'
    ];

    public function getDetailedData()
    {
        return $this->select('pengunjung.*, departemen.nama_departemen, tujuan.tujuan')
                    ->join('departemen', 'pengunjung.department_id = departemen.department_id', 'left')
                    ->join('tujuan', 'pengunjung.tujuan_id = tujuan.tujuan_id', 'left')
                    ->findAll();
    }
}

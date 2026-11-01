<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyUrl extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'myurl';

    // Primary key
    protected $primaryKey = 'id';

    // Menggunakan timestamps otomatis
    public $timestamps = true;

    // Kolom yang dapat diisi melalui mass assignment
    protected $fillable = [
        'url_id',
        'visited_at',
        'status',
        'created_at',
        'updated_at'
    ];

    /**
     * Relasi ke tabel urls
     * Setiap kunjungan merujuk ke satu URL.
     */
    public function url()
    {
        return $this->belongsTo(Url::class, 'url_id', 'id');
    }
}

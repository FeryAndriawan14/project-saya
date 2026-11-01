<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'urls';

    // Primary key
    protected $primaryKey = 'id';

    // Menggunakan timestamps otomatis
    public $timestamps = true;

    // Kolom yang dapat diisi melalui mass assignment
    protected $fillable = [
        'long_url',
        'short_url',
        'status',
        'visits',
        'qr_code',
    ];

    /**
     * Relasi ke tabel myurl
     * Setiap URL bisa memiliki banyak entri myurl.
     */
    public function myUrls()
    {
        return $this->hasMany(MyUrl::class, 'url_id', 'id');
    }
}

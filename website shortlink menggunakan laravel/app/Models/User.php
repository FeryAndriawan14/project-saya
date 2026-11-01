<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Nama tabel
    protected $table = 'users';

    // Primary key
    protected $primaryKey = 'id';

    // Timestamps otomatis
    public $timestamps = true;

    // Kolom yang dapat diisi melalui mass assignment
    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'remember_token',
        'created_at',
        'updated_at'
    ];

    // Kolom yang disembunyikan saat serialisasi
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Relasi ke tabel URLs
     * Setiap pengguna dapat memiliki banyak URL.
     */
    public function urls()
    {
        return $this->hasMany(Url::class, 'user_id', 'id');
    }
}

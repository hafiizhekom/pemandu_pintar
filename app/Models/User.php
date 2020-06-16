<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * @var array
     */


    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'integer';
    public $timestamps = true;

    protected $table = 'user';

    protected $fillable = ['nama_lengkap', 'tanggal_lahir', 'jenis_kelamin', 'alamat', 'no_telepon', 'email', 'no_rekening', 'riwayat_penyakit', 'foto', 'password', 'role'];


    protected $hidden = [
        'password'
    ];

    protected $connection = 'mysql';

    public function pendakians()
    {
        return $this->hasMany('App\Models\Pendakian', 'pendaki');
    }

    public function pemanduans()
    {
        return $this->hasMany('App\Models\Pemanduan', 'pemandu');
    }

}

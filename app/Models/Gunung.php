<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gunung extends Model
{
    /**
     * @var array
     */


    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'integer';
    public $timestamps = true;

    protected $table = 'gunung';

    protected $fillable = ['nama_gunung', 'ketinggian', 'letak', 'curah_hujan', 'deskripsi'];

    protected $connection = 'mysql';

    public function pendakians()
    {
        return $this->hasMany('App\Models\Pendakian', 'gunung');
    }

}

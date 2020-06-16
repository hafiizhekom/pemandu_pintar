<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendakian extends Model
{
    /**
     * @var array
     */


    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'integer';
    public $timestamps = true;

    protected $table = 'pendakian';

    protected $fillable = ['pendaki', 'gunung', 'jumlah_orang', 'tanggal_keberangkatan', 'hari', 'status', 'pembayaran', 'bukti_pembayaran'];

    protected $connection = 'mysql';

    public function pemanduans()
    {
        return $this->hasMany('App\Models\Pemanduan', 'pendakian');
    }

    public function gunung()
    {
        return $this->belongsTo('App\Models\Gunung', 'gunung');
    }

    public function pendaki()
    {
        return $this->belongsTo('App\Models\User', 'pendaki');
    }

}

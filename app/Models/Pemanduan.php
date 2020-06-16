<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemanduan extends Model
{
    /**
     * @var array
     */


    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'integer';
    public $timestamps = true;

    protected $table = 'pemanduan';

    protected $fillable = ['pemandu', 'pendakian', 'harga', 'catatan', 'approved'];

    protected $connection = 'mysql';

    public function pendakian()
    {
        return $this->belongsTo('App\Models\Pendakian', 'pendakian');
    }

    public function pemandu()
    {
        return $this->belongsTo('App\Models\User', 'pemandu');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MDatadiri extends Model
{
    protected $table = "datadiri";
    protected $fillable = ['nohp','alamat','pegawai_id'];
    public function pegawai()
    {
    	return $this->belongsTo('App\Pegawai');
    }    
}

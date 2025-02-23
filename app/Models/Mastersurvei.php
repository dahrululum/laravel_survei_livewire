<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mastersurvei extends Model
{
    use HasFactory;
    protected $table = 'master_survei';
    protected $fillable = [
        'id',
        'id_instansi',
        'alias',
        'nama',
        'no_rekom',
        'berkas_rekom',
        'jenis_survei',
        'tglsurvei',
        'tipe_soal',
        'jml_soal',
        'jml_jawaban',
        'ket',
        'status',
        'inputby',
        'status_publish',
        'tglpublish',
        
        
        
    ];
/*************  ✨ Codeium Command ⭐  *************/
    /**
     * Hubungan dengan tabel Instansi (SKPD)
     * 
/******  e4d66861-58c4-41f0-b9a3-1ee6bcd46b9b  *******/
    public function getSKPD()
    {
        return $this->hasOne(Instansi::class,'id','id_instansi')->withDefault();
    }
    public function getJWBRES()
    {
        return $this->hasMany(Jwb_skm::class,'id_survei','id');
    }
}

<?php

namespace App\Models;

use App\Components\Html;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'skpd';
    protected $fillable = [
        'id',
        // 'id_induk',
        // 'id_instansi_jenis',
        // 'no_urut',
        'kdskpd',
        'namaskpd',
        'kdurusan',
        'kdbidang',

         
        
    ];
    // public function hasSub()
    // {
    //     return $this->hasMany(Instansi::class, 'id_induk', 'id')->orderby('no_urut','asc');
    // }
    // public function hasUser()
    // {
    //     return $this->hasOne(Admin::class, 'id_instansi', 'id')->withDefault();
    // }
    public function getHasilSurvei()
    {
        return $this->hasMany(Hasilsurvei::class,'id_instansi','id');
    }
}

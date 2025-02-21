<?php

namespace App\Models;
use App\Components\Html;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jwb_skm extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'jawaban_skm';
    protected $fillable = [
        'id',
        'alias',
        'id_survei',
        'jenis_survei',
        'id_responden',
        'email',
        'jenkel',
        'umur',
        'pekerjaan',
        'pendidikan',
        'status',
        'ket',
        'saran',
        'tglinput',
        'status_saran',
        'jenis_layanan'
        
    ];
    
    public function getDetail()
    {
        
        return $this->hasMany(Jwb_skm_detail::class, 'id_responden','id_responden')->distinct();
    }
    public function getJwbNull()
    {
        
        return $this->hasMany(Jwb_skm_detail::class, 'id_responden','id_responden')->distinct();
    }
    public function getJWB()
    {
        return $this->hasOne(Jwb_skm_detail::class,'id_responden','id_responden');
    }
    public function getMASTER()
    {
        return $this->hasOne(Mastersurvei::class,'id','id_survei');
    }
    public function getRefumur()
    {
        return $this->hasOne(Refumum::class,'kode','umur')->where('jenis','umur')->withDefault();
    }
    public function getRefpend()
    {
        return $this->hasOne(Refumum::class,'kode','pendidikan')->where('jenis','tingkat_pendidikan')->withDefault();
    }
    public function getRefjenkel()
    {
        return $this->hasOne(Refumum::class,'kode','jenkel')->where('jenis','jenkel')->withDefault();
    }
    public function getRefjob()
    {
        return $this->hasOne(Refumum::class,'kode','pekerjaan')->where('jenis','pekerjaan')->withDefault();
    }
     
}

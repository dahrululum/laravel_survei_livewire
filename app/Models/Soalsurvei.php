<?php

namespace App\Models;
use App\Components\Html;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soalsurvei extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'soal_skm';
    protected $fillable = [
        'id',
        'id_survei',
        
        'tipe_soal',
        'jml_soal',
        'jml_jawaban',
        
        'alias',
        'nama',
        'no_soal',
        'nama_soal',
        'ket',
        
        
        
    ];
    public function getMaster()
    {
        return $this->hasOne(Mastersurvei::class,'id','id_survei')->withDefault();
    }
    public function getPILIHAN()
    {
        return $this->hasMany(Jawabansurvei::class,'id_soal','id');
    }
    public function getTipesoal()
    {
        return $this->hasOne(Refumum::class,'kode','tipe_soal')->where('jenis','tipe_soal')->withDefault();
    }
}

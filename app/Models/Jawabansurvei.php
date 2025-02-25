<?php

namespace App\Models;
use App\Components\Html;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawabansurvei extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'detail_jawaban';
    protected $fillable = [
        'id',
        'id_survei',
        'id_soal',
        'alias',
        'no_jawaban',
        'nama_jawaban',
        'nilai_jawaban',
        'ket',
        
        
        
    ];
    public function getMaster()
    {
        return $this->hasOne(Mastersurvei::class,'id','id_survei')->withDefault();
    }
    public function getSoal()
    {
        return $this->hasOne(Soalsurvei::class,'id','id_soal')->withDefault();
    }
}

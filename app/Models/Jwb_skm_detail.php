<?php

namespace App\Models;
use App\Components\Html;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jwb_skm_detail extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'jawaban_skm_detail';
    protected $fillable = [
        'id',
        'id_survei',
        'id_responden',
        'id_soal',
        'no_soal',
        'jawaban',
        'status',
        'ket',
        'tglinput',
        
        
        
    ];

    public function getSKM()
    {
        return $this->belongsToMany(Jwb_skm::class, 'id_responden');
    }
    public function getDetail($idsurvei,$idresponden,$idsoal)
    {
        $query = parent::query();
        $query->where('id_survei',$idsurvei)->where('id_responden',$idresponden)->where('no_soal',$idsoal);
        $query->orderby('id','desc');
        return $query;
    }
}

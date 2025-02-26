<?php

namespace App\Models;
use App\Components\Html;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refumum extends Model
{
    use HasFactory;
   
    protected $table = 'referensi_umum';
    protected $fillable = [
        'id',
        'jenis',
        'kelompok',
        'tipe',
        'namatipe',
        'kode',
        'nama',
        'alias',
        'status',
        
       
        
        
    ];
    public static function listRef($jenis)
    {
        return self::select('id','nama','kode')
                    ->where('jenis',$jenis)->get();
    }
    
    // public static function listJob()
    // {
    //     return self::where('jenis','pekerjaan')->get();
    // }
    // public static function listPendidikan()
    // {
    //     return self::where('jenis','tingkat_pendidikan')->get();
    // }
    // public static function listUmur()
    // {
    //     return self::where('jenis','umur')->get();
    // }
    // public static function listJenkel()
    // {
    //     return self::where('jenis','jenkel')->get();
    // }
     
}

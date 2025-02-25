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
}

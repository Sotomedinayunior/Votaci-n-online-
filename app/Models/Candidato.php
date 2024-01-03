<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    protected $table = "candidato";
    protected $fillable = ['nombre' , 'descripcion'  , 'imagen'];
    use HasFactory;
    public function votes(){
        return $this->hasMany(Voto::class);
    }


}
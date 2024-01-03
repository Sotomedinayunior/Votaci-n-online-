<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voto extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'candidate_id'];
    protected $table = 'voto';


    public function User(){
        return $this->belongsTo(User::class);
    }

    public function candidato(){
        return $this->belongsTo(Candidato::class);
    }
}

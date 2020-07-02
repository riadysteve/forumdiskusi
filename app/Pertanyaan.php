<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    protected $table = 'pertanyaan';
    protected $fillable = ['judul', 'isi'];
    
    public function jawaban()
    {
        return $this->hasMany('App\Jawaban');
    }
}
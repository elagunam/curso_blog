<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function tema(){
        return $this->belongsTo(Tema::class, 'id_tema', 'id');
    }

    public function autor(){
        return $this->belongsTo(User::class, 'id_autor', 'id');
    }
}

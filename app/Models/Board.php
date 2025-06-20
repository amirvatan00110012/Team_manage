<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    /** @use HasFactory<\Database\Factories\BoardFactory> */
    use HasFactory;



    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function boardLists(){
        return $this->hasMany(BoardList::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardList extends Model
{
    /** @use HasFactory<\Database\Factories\BoardListFactory> */
    use HasFactory;

    public function cards(){
        return $this->hasMany(Card::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /** @use HasFactory<\Database\Factories\CommentFactory> */
    use HasFactory;

    
    public function card(){
        return $this->belongsTo(Card::class);
    }

    public function user(){
        return $this->belongsTo(Card::class);
    }
    
}

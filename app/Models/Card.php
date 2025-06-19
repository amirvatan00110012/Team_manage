<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    /** @use HasFactory<\Database\Factories\CardFactory> */
    use HasFactory;

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function tags(){
        return $this->hasMany(Tag::class);
    }

    public function attachments(){
        return $this->hasMany(Attachment::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }
}

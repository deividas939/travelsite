<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','story_title', 'story', 'sum_colect', 'updated_at', 'created_at','photo'];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function photo()
    {
        return $this->hasMany(Photo::class);
    }
    
}

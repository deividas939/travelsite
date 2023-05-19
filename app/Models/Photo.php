<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = ['photo', 'cat_id', 'name'];

    public function cat()
    {
        return $this->belongsTo('App\Models\Cat');
    }
}

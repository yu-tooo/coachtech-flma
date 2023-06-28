<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function likes()
    {
        return $this->hasMany('App\Models\Like');
    }

    public function comment()
    {
        return $this->hasOne('App\Models\Comment')->withDefault();
    }
}

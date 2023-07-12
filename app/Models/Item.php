<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    public function like()
    {
        return $this->hasOne(Like::class)->withDefault();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function comment()
    {
        return $this->hasOne(Comment::class)->withDefault();
    }

    public function sold_items()
    {
        return $this->hasMany(SoldItem::class);
    }
    
    public function categories()
    {
        return $this->belongsToMany(Category::class, CategoryItem::class);
    }

    public function condition()
    {
        return $this->belongsTo(Condition::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

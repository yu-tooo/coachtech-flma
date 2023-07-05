<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'item_id'
    ];

    public function isLike($user_id)
    {
        return $this->where('user_id', $user_id)->where('item_id', $this->item_id)
        ->exists();
    }
}

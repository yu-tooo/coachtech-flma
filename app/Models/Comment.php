<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'item_id', 'comment'];

    public function user()
    {
        return $this->BelongsTo(User::class);
    }

    public function getCount($item_id)
    {
        return $this->where('item_id', $item_id)->count();
    }
}

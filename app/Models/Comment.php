<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'item_id', 'comment'];

    public function user()
    {
        return $this->BelongsTo('App\Models\User');
    }

    public function item()
    {
        return $this->BelongsTo('App\Models\Item');
    }

}

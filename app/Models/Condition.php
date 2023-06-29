<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\CssSelector\Node\FunctionNode;

class Condition extends Model
{
    use HasFactory;

    protected $fillable = ['condition'];

    public function getCondition()
    {
        return $this->condition;
    }
}

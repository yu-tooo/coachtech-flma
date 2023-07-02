<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'img_url',
        'postcode',
        'address',
        'building',
    ];

    public function getUrl() 
    {
        return $this->img_url ?? 'default.png';
    }

    public function getPostCode()
    {
        return $this->postcode;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getBuilding()
    {
        return $this->building;
    }
}

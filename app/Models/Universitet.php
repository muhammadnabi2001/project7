<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Universitet extends Model
{
    protected $fillable=['name'];
    public function facultets()
    {
        return $this->hasMany(Facultet::class,'universitet_id');
    }
}

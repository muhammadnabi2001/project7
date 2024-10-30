<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Yunalish extends Model
{
    protected $fillable=['name','facultet_id'];
    public function facultet()
    {
        return $this->belongsTo(Facultet::class,'facultet_id');
    }
    public function gruxs()
    {
        return $this->hasMany(Grux::class,'yunalish_id');
    }
}

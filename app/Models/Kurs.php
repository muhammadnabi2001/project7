<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kurs extends Model
{
    protected $fillable=['name'];
    public function gruxs()
    {
        return $this->hasMany(Grux::class,'kurs_id');
    }
}

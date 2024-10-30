<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Facultet extends Model
{
    protected $fillable=['name','universitet_id'];
    public function universitet()
    {
        return $this->belongsTo(Universitet::class,'universitet_id');
    }
    public function yunalishs()
    {
        return $this->hasMany(Yunalish::class,'facultet_id');
    }
}

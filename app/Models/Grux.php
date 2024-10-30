<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Grux extends Model
{
    protected $fillable=[
        'name',
        'kurs_id',
        'yunalish_id'
    ];
    public function kurs()
    {
        return $this->belongsTo(Kurs::class,'kurs_id');
    }
    public function yunalish()
    {
        return $this->belongsTo(Yunalish::class,'yunalish_id');
    }
    public function talabas()
    {
        return $this->hasMany(Talaba::class,'grux_id');
    }
}

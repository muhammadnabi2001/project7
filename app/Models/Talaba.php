<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Talaba extends Model
{
    protected $fillable=[
        'name',
        'tel',
        'grux_id',
        'manzil_id'
    ];
    public function grux()
    {
        return $this->belongsTo(Grux::class,'grux_id');
    }
    public function manzil()
    {
        return $this->belongsTo(Manzil::class,'manzil_id');
    }
}

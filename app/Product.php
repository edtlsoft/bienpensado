<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function bodega()
    {
        return $this->belongsTo(Bodega::class);
    }
}

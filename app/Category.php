<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class   Category extends Model
{
    public function scopeActive($query,$id)
    {
        return $query->where('id',$id);
    }
}

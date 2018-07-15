<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Province;

class City extends Model
{
    protected $primaryKey = 'city_id';

    public function provinces()
    {
        return $this->belongsTo(Province::class,'province_id');
    }
}

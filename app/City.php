<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Province;

class City extends Model
{
    protected $primaryKey = 'city_id';

    protected $fillable = [
        'province_id', 'city_name', 'city_name_native', 'city_code','city_short_code','enable_status', 'created_by'
    ];

    public function provinces()
    {
        return $this->belongsTo(Province::class,'province_id');
    }
}

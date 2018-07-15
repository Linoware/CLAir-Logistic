<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Country;
use App\City;
class Province extends Model
{

    protected $primaryKey = 'province_id';

    public function countries()
    {
        return $this->belongsTo(Country::class,'country_id');
    }

    public function children()
    {
        return $this->hasMany(City::class,'province_id');
    }
}

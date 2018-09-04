<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Country;
use App\City;
class Province extends Model
{

    protected $primaryKey = 'province_id';

    protected $fillable = [
        'country_id', 'province_name', 'province_name_native', 'province_code','province_short_code','enable_status', 'created_by'
    ];

    public function countries()
    {
        return $this->belongsTo(Country::class,'country_id');
    }

    public function children()
    {
        return $this->hasMany(City::class,'province_id');
    }
}

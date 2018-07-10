<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Country extends Model
{

    protected $primaryKey = 'country_id';

    protected $fillable = [
        'country_name', 'country_name_native', 'country_code','country_short_code','enable_status'
    ];

    public function users()
    {
        return $this->belongsTo(User::class,'created_by');
    }

    public function updated_user()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}

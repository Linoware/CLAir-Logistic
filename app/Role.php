<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Role extends Model
{

    protected $fillable = [
        'name', 'guard_name'
    ];

    public function users()
    {
        return $this->belongsToMany('User','user_role','role_id','user_id');
    }
}

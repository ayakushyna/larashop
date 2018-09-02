<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAuth extends Model
{
    public function rolesAuth()
    {
        return $this->belongsToMany(Role::class);
    }
}

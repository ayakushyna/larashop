<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public static function isAdmin()
    {
        if($user = auth()->user())
        {
            if($user->roles()->first()->name === 'admin')
                return true;
        }
        else
        {
            return false;
        }
    }
    public static function isManager()
    {
        if($user = auth()->user())
        {
            if($user->roles()->first()->name === 'manager')
                return true;
        }
        else
        {
            return false;
        }
    }
    public static function isStorekeeper()
    {
        if($user = auth()->user())
        {
            if($user->roles()->first()->name === 'storekeeper')
                return true;
        }
        else
        {
            return false;
        }
    }
}

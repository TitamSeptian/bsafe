<?php

namespace App;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $guarded = ["id"];
    protected $hidden = ["password"];

    public function admin()
    {
        return $this->hasMany(Admin::class);;
    }

    public function driver()
    {
        return $this->hasMany(Driver::class);;
    }

    public function material()
    {
        return $this->hasMany(Material::class);
    }

    public function operator()
    {
        return $this->hasMany(Operator::class);
    }
}

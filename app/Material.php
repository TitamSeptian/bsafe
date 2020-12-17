<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = "materials";
    protected $guarded = ["id"];

    public function driver_material()
    {
    	return $this->hasMany(DriverMaterial::class);
    }

    public function material_attachment()
    {
    	return $this->hasMany(MaterialAttachment::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DriverMaterial extends Model
{
	protected $table = "driver_materials";
    protected $guarded = ["id"];

    public function attachment()
    {
    	return $this->belongsTo(Attachment::class);
    }

    public function material()
    {
    	return $this->belongsTo(Material::class);
    }

}

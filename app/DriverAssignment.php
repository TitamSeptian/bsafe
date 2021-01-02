<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DriverAssignment extends Model
{
    protected $table = 'driver_assignments';
    protected $guarded = ['id'];
    
    public function assignment()
    {
    	return $this->belongsTo(Assignment::class);
    }

    public function material()
    {
    	return $this->belongsTo(Material::class);
    }
}

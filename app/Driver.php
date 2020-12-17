<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $table = "drivers";
    protected $guarded = ["id"];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

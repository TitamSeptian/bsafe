<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $table = "assignments";
    protected $guarded = ["id"];
    
    public function assignment_attachment()
    {
    	return $this->hasMany(AssignmentAttachment::class);
    }
}

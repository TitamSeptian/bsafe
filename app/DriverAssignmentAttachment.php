<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DriverAssignmentAttachment extends Model
{
    protected $table = "driver_assignment_attachments";
    protected $guarded = ['id'];
    public function assignment()
    {
    	return $this->belongsTo(Assignment::class);
    }

    public function attachment()
    {
    	return $this->belongsTo(Attachment::class);
    }

    public function driver()
    {
    	return $this->belongsTo(Driver::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignmentAttachment extends Model
{
    protected $table = "assignment_attachments";
    protected $guarded = ["id"];
    
    public function assignment()
    {
    	return $this->belongsTo(Assignment::class);
    }

    public function attachment()
    {
    	return $this->belongsTo(Attachment::class);
    }
}

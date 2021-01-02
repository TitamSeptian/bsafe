<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $table = "attachments";
    protected $guarded = ["id"];
    
    public function assignment_attachment()
    {
        return $this->hasMany(AssignmentAttachment::class);
    }

    

    public function material_attachments()
    {
        return $this->hasMany(MaterialAttachment::class);
    }
}

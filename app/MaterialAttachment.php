<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialAttachment extends Model
{
    protected $table = "material_attachments";
    protected $guarded = ["id"];

    public function material()
    {
    	return $this->belongsTo(Material::class);
    }

    public function attachment()
    {
    	return $this->belongsTo(Attachment::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    protected $table = "operators";
    protected $guarded = ["id"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

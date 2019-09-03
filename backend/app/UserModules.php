<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserModules extends Model
{
    protected $guarded = [];
    
    public function module()
    {
        return $this->belongsTo(Modules::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

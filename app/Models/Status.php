<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    //new1
    /*暂时指定一对一关系*/
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

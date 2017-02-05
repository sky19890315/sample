<?php

namespace App\Models;
xdebug_start_trace();


use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = ['content'];
    //new1
    /*暂时指定一对一关系*/
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

xdebug_stop_trace();
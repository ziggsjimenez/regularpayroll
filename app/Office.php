<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    protected $fillable = ['name','head','position','code'];

    public function employees(){

        return $this->hasMany('App\Employee');

    }
}

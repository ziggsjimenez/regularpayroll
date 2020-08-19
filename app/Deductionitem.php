<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deductionitem extends Model
{
    protected $fillable =  ['name','deductionmode_id','deductionmodecategory_id'
    ];

    public function deductionmode(){
        return $this->belongsTo('App\Deductionmode');
    }

    public function deductionmodecategory(){
        return $this->belongsTo('App\Deductionmodecategory');
    }
}






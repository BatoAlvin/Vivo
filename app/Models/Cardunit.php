<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cardunit extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function cardnumber(){
        return $this->belongsTo(Cardnumber::class,'cardnumber_id');
    }

    public function unitnumber(){
        return $this->belongsTo(Unit::class,'unitnumber_id','id');
    }

}

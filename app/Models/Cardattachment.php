<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cardattachment extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function cardNumber(){
        return $this->belongsTo(Cardnumber::class,'card_id','id');
    }

    public function unitNumber(){
        return $this->belongsTo(Unit::class,'unit_id','id');
    }

    public function clientNumber(){
        return $this->belongsTo(Clients::class,'client_id','id');
    }

    public function counters(){
        return $this->hasMany(Cardattachmentpayment::class,'count_id','id');
    }
}

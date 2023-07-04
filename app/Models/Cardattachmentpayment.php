<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cardattachmentpayment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function cardNumbers(){
        return $this->belongsTo(Cardnumber::class,'cardnumberp','id');
    }

    public function unitNumbers(){
        return $this->belongsTo(Unit::class,'unitnamex','id');
    }

    public function clientNumbers(){
        return $this->belongsTo(Clients::class,'clientnamex','id');
    }

    
}

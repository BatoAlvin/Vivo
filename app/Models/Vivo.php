<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vivo extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function client(){
        return $this->belongsTo(Clients::class,'client_id','id');
    }

    public function card(){
        return $this->belongsTo(Cardnumber::class,'card_id','id');
    }
}

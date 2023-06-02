<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vivorecord extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function project(){
        return $this->belongsTo(Project::class,'project_id','id');
    }

    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }

    public function registration(){
        return $this->belongsTo(Registration::class,'registration_id','id');
    }

    public function client(){
        return $this->belongsTo(Clients::class,'client_id','id');
    }

}

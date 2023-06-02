<?php

namespace App\Http\Controllers;
use App\Models\Cardnumber;
use App\Models\Clients;
use App\Models\Vivo;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        $cards = Cardnumber::where("status",1)->get();
        $card = $cards->count();
        $cardout = Cardnumber::where("status",1)->count();
        $client = Clients::where("status",1)->count();
        $taken = 0;
        foreach($cards as $cd){
            $check = Vivo::where('card_id',$cd->id)->get();
            if (count($check)>0) {
                $taken++;
            }
          }
        return view('dashboard',['card'=>$card,'client'=>$client,'cardout'=>$taken]);
    }


}

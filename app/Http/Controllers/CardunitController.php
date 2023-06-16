<?php

namespace App\Http\Controllers;

use App\Models\Cardunit;
use Illuminate\Http\Request;
use App\Models\Clients;
use App\Models\Cardnumber;
use App\Models\Unit;

class CardunitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $card = Cardnumber::where('status',1)->get();
        $unit = Unit::where('status',1)->get();
        $cardunit = Cardunit::with('cardnumber','unitnumber')->where('status',1)->get();

        // $cdArr = [];
        // foreach($card as $cd){
        // $check = Vivo::where('card_id',$cd->id)->where('status',1)->get();
        // if (count($check)<1) {
        //     array_push($cdArr,$cd);
        //   }
        // }
        return view('cardunits.index',['card'=>$card,'unit'=>$unit,'cardunit'=>$cardunit]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post_service = Cardunit::create([
            'cardnumber_id' => $request->cardnumber_id,
            'unitnumber_id' => $request->unitnumber_id,
          ]);
          return redirect('/cardunit')->with('message', " saved successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function show(cr $cr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function edit(cr $cr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cr $cr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function destroy(cr $cr)
    {
        //
    }
}

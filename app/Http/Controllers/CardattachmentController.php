<?php

namespace App\Http\Controllers;

use App\Models\Cardattachment;
use App\Models\Cardunit;
use App\Models\Cardnumber;
use App\Models\Clients;
use App\Models\Unit;
use Illuminate\Http\Request;

class CardattachmentController extends Controller
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
        $client = Clients::where('status',1)->get();
        $cardattachment = Cardattachment::with('cardNumber','unitNumber','clientNumber')->get();
        return view('cardattachments.index',['card'=>$card,'unit'=>$unit,'client'=>$client,'cardattachment'=>$cardattachment]);

    }

    public function quantity($id){
        $datas = Cardunit::where('cardnumber_id',$id)->where('status',1)->with('unitnumber')->get();
         return response()->json($datas);
         // if ($datas) {
         //     $unitName = $datas->location;
         //     return response()->json(['location' => $unitName]);
         // } else {
         //     return response()->json(['error' => 'Unit not found'], 404);
         // }
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
        
        $post_service = Cardattachment::create([
            'client_id' => $request->client_id,
            'card_id' => $request->card_id,
            'unit_id' => $request->unit_id,
          ]);
          return redirect('/cardattachment')->with('message', " saved successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cardattachment  $cardattachment
     * @return \Illuminate\Http\Response
     */
    public function show(Cardattachment $cardattachment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cardattachment  $cardattachment
     * @return \Illuminate\Http\Response
     */
    public function edit(Cardattachment $cardattachment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cardattachment  $cardattachment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cardattachment $cardattachment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cardattachment  $cardattachment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cardattachment $cardattachment)
    {
        //
    }
}

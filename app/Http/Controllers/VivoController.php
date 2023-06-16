<?php

namespace App\Http\Controllers;

use App\Models\Vivo;
use App\Models\Clients;
use App\Models\Cardnumber;
use Illuminate\Http\Request;
use DB;


class VivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = Clients::where('status',1)->get();
        $card = Cardnumber::where('status',1)->get();
        $vivo = Vivo::with('client','card')->where('status',1)->get();
        // return $unit = Vivo::where('status',1)->first('unit_id');
        $cdArr = [];
        foreach($card as $cd){
        $check = Vivo::where('card_id',$cd->id)->where('status',1)->get();
        if (count($check)<1) {
            array_push($cdArr,$cd);
}
        }
        return view('vivo.index',['client'=>$client,'card'=>$cdArr,'vivo'=>$vivo]);
    }


    public function quantity($id){
        $datas =  Clients::where('id', $id)->first()->units;
        return response()->json($datas);
    }

    public function useunits(Request $request, $id){
        $units =  Vivo::where('id', $id)->first();
        $units->unit_id = $units->unit_id - $request->units;
        $units->save();
        return Redirect()->back();
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

        $post_service = Vivo::create([
            'client_id' => $request->client_id,
            'card_id' => $request->card_id,
            'unit_id' => $request->unit_id,
          ]);
          return redirect('/vivo')->with('message', " saved successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vivo  $vivo
     * @return \Illuminate\Http\Response
     */
    public function show(Vivo $vivo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vivo  $vivo
     * @return \Illuminate\Http\Response
     */
    public function edit(Vivo $vivo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vivo  $vivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vivo $vivo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vivo  $vivo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $members=Vivo::find($id);
        $members->update([
          'status'=>0,
        ]);
        return redirect('/vivo')->with('message', "Record removed successfully");
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Cardnumber;
use Illuminate\Http\Request;

class CardnumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $card = Cardnumber::where('status',1)->get();
            return view('cardnumbers.index')->with('card',$card);
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
        $post_service = Cardnumber::create([
            'cardnumber' => $request->cardnumber,
          ]);
          return redirect('/cardnumber')->with('message', "Card Number $post_service->family_name saved successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cardnumber  $cardnumber
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $card = Cardnumber::find($id);
        return view('cardnumbers.cardnumber')->with('card', $card);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cardnumber  $cardnumber
     * @return \Illuminate\Http\Response
     */
    public function edit(Cardnumber $cardnumber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cardnumber  $cardnumber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $check = Cardnumber::where('id',$id)->first();
        if ($check) {
            $service = Cardnumber::where('id',$id)->update([
                 'cardnumber' => $request->cardnumber,

            ]);
        return redirect('/cardnumber')->with('message', "Card Number updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cardnumber  $cardnumber
     * @return \Illuminate\Http\Response
     */


}
public function destroy($id)
    {
        $members=Cardnumber::find($id);
        $members->update([
          'status'=>0,
        ]);
        return redirect('/cardnumber')->with('message', "Card Number removed successfully");
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Cardholder;
use Illuminate\Http\Request;

class CardholderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cardholder = Cardholder::where('status',1)->get();
        return view('cardholders.index')->with('cardholder',$cardholder);
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
        $post_service = Cardholder::create([
            'cardholder' => ucfirst(strtolower($request->cardholder)),
          ]);
          return redirect('/cardholder')->with('message', "$post_service saved successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cardholder  $cardholder
     * @return \Illuminate\Http\Response
     */
    public function show(Cardholder $cardholder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cardholder  $cardholder
     * @return \Illuminate\Http\Response
     */
    public function edit(Cardholder $cardholder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cardholder  $cardholder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $check = Cardholder::where('id',$id)->first();
        if ($check) {
            $service = Cardholder::where('id',$id)->update([
                 'cardholder' => $request->cardholder,

            ]);
        return redirect('/cardholder')->with('message', "Cardholder updated successfully");
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cardholder  $cardholder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cardholder $id)
    {
        //
    }
}

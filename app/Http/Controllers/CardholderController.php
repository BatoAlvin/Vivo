<?php

namespace App\Http\Controllers;

use App\Models\Cardholder;
use Illuminate\Http\Request;
use App\Helpers\Helper;

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
        // $generator = Helper::IDGenerator(new Cardholder,'rec_id','KH',5);
        $data = Cardholder::orderBy('id','desc')->first();
        if(!$data)
        {
            $increment_last_number = 1;
            $mynumber = 'KHS0001';
        }else{
            $increment_last_number = $data->rec_id+1;
            $last_number_length = strlen($increment_last_number);
            if($last_number_length<2){
                $mynumber = 'KHS000'.$increment_last_number;
            }
            else if($last_number_length<3){
                $mynumber = 'KHS00'.$increment_last_number;
            }
            else if($last_number_length<4){
                $mynumber = 'KHS0'.$increment_last_number;
            }
            else{
                $mynumber = 'KHS'.$increment_last_number;
            }
        }

        $post_service = Cardholder::create([
             'cardholder' => ucfirst(strtolower($request->cardholder)),
             'rec_id' => $increment_last_number,
             'code' => $mynumber,
            //  $student->rec_id = $request->input('rec_id'),

           ]);

        // $post_service = Cardholder::create([
        //     'cardholder' => ucfirst(strtolower($request->cardholder)),

        //   ]);
          return redirect('/cardholder')->with('message', "$model saved successfully");
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

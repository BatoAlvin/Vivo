<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = Clients::where('status',1)->get();
            return view('clients.index')->with('client',$client);
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
        $data = Clients::orderBy('id','desc')->first();
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

        $post_service = Clients::create([
            'clientname' => ucfirst(strtolower($request->clientname)),
            'units' =>$request->units,
            'rec_id' => $increment_last_number,
             'code' => $mynumber,
          ]);
          return redirect('/client')->with('message', "Client $post_service->clientname saved successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Clients::find($id);
        return view('clients.client')->with('client', $client);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function edit(Clients $clients)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $clients)
    {
        $check = Clients::where('id',$id)->first();
        if ($check) {
            $service = Clients::where('id',$id)->update([
                 'clientname' => $request->clientname,
                 'units' => $request->units,

            ]);
        return redirect('/unit')->with('message', "Client updated successfully");
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clients $clients)
    {
        //
    }
}

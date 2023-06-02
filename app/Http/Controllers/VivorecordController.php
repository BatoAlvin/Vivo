<?php

namespace App\Http\Controllers;

use App\Models\Vivorecord;
use App\Models\Vivo;
use App\Models\Cardholder;
use App\Models\Cardnumber;
use App\Models\Clients;
use App\Models\Project;
use App\Models\Product;
use App\Models\Registration;
use Illuminate\Http\Request;
use Carbon\Carbon;

class VivorecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vivorecord = Vivorecord::with('project','product','client','registration')->where('status',1)->get();
        $project = Project::where('status',1)->get();
        $product = Product::where('status',1)->get();
        $registration = Registration::where('status',1)->get();
        $card = Cardnumber::where("status",1)->get();
        $client = Clients::where("status",1)->get();
        $heading = 'Vivo Energy';
        return view('vivorecords.index',['project'=>$project,'product'=>$product,'registration'=>$registration,'card'=>$card,'vivorecord'=>$vivorecord,'client'=>$client,'heading'=>$heading]);
    }

    public function filter($id)
    {

        // Carbon::parse($this->created_at)->format("Y-m-d");
        // date('Y-m-d');
        if($id == 1){
            $vivorecord = Vivorecord::with('project','product','client','registration')->where('status',1)->whereDate('created_at', date('Y-m-d'))->get();
            $project = Project::where('status',1)->get();
            $product = Product::where('status',1)->get();
            $registration = Registration::where('status',1)->get();
            $card = Cardnumber::where("status",1)->get();
            $client = Clients::where("status",1)->get();
            $heading = 'Today';
        }else if($id == 2){

            $vivorecord = Vivorecord::with('project','product','client','registration')->where('created_at', '>=', Carbon::now()->subDays('7'))->get();
            $project = Project::where('status',1)->get();
            $product = Product::where('status',1)->get();
            $registration = Registration::where('status',1)->get();
            $card = Cardnumber::where("status",1)->get();
            $client = Clients::where("status",1)->get();
            $heading = 'Last 7 Days';

        }else if($id == 3){
            $vivorecord = Vivorecord::with('project','product','client','registration')->where('created_at', '>=', Carbon::now()->subMonth('1'))->get();
            $project = Project::where('status',1)->get();
            $product = Product::where('status',1)->get();
            $registration = Registration::where('status',1)->get();
            $card = Cardnumber::where("status",1)->get();
            $client = Clients::where("status",1)->get();
            $heading = 'Last Month';

        }
        return view('vivorecords.index',['project'=>$project,'product'=>$product,'registration'=>$registration,'card'=>$card,'vivorecord'=>$vivorecord,'client'=>$client,'heading'=>$heading]);

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
        $post_service = Vivorecord::create([
            'project_id' => $request->project_id,
            'product_id' => $request->product_id,
            // 'cardholder_id' => $request->cardholder_id,
            'client_id' => $request->client_id,
            'registration_id' => $request->registration_id,
            'description' => $request->description,
            'litres' => $request->litres,
            'unit_cost' => $request->unit_cost,
            'purchases' => $request->purchases,
          ]);
          return redirect('/vivorecord')->with('message', " saved successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vivorecord  $vivorecord
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vivo = Vivorecord::with('project','product','client','registration')->find($id);
        // return view('vivorecords.index',['project'=>$project,'product'=>$product,'registration'=>$registration,'card'=>$card,'vivorecord'=>$vivorecord,'client'=>$client,'heading'=>$heading]);

        return view('vivorecords.vivorecord')->with('vivo', $vivo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vivorecord  $vivorecord
     * @return \Illuminate\Http\Response
     */
    public function edit(Vivorecord $vivorecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vivorecord  $vivorecord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vivorecord $vivorecord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vivorecord  $vivorecord
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $members=Vivorecord::find($id);
        $members->update([
          'status'=>0,
        ]);
        return redirect('/vivorecord')->with('message', "Record removed successfully");
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Cardattachmentsummary;
use App\Models\Cardattachmentpayment;
use App\Models\Cardattachment;
use Illuminate\Http\Request;

class CardattachmentsummaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $membersavings = [];
        $members = Cardattachment::all();

        // $members = Familymembers::where('status',1)->get();
        foreach ($members as $member) {
        $savings = Cardattachmentpayment::with('cardNumbers')->where(['cardnumberp'=>$member->id])->sum('amountpaidx');
        array_push($membersavings,['id'=>$member->id,'cardnumberp'=>$member->client_id,'amountpaidx'=>$savings]);
              }
        return view('cardattachmentsummaries.index',['savingsummary'=>$membersavings]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cardattachmentsummary  $cardattachmentsummary
     * @return \Illuminate\Http\Response
     */
    public function show(Cardattachmentsummary $cardattachmentsummary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cardattachmentsummary  $cardattachmentsummary
     * @return \Illuminate\Http\Response
     */
    public function edit(Cardattachmentsummary $cardattachmentsummary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cardattachmentsummary  $cardattachmentsummary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cardattachmentsummary $cardattachmentsummary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cardattachmentsummary  $cardattachmentsummary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cardattachmentsummary $cardattachmentsummary)
    {
        //
    }
}

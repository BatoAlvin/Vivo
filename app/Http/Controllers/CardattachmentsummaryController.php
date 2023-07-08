<?php

namespace App\Http\Controllers;

use App\Models\Cardattachmentsummary;
use App\Models\Cardattachmentpayment;
use App\Models\Cardattachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CardattachmentsummaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $card = DB::table('cardattachmentpayments')
        ->join('cardnumbers', 'cardnumbers.id', 'cardattachmentpayments.cardnumberp')
        ->select('cardnumbers.cardnumber as card')
        ->selectRaw('cardnumbers.id as id')
        ->selectRaw('SUM(cardattachmentpayments.amountpaidx) as total')
        ->groupBy('cardnumbers.cardnumber', 'cardnumbers.id') // Include cardnumbers.id in the GROUP BY clause
        ->get();
        return view('cardattachmentsummaries.index')->with('card',$card);

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

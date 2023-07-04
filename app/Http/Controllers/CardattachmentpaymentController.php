<?php

namespace App\Http\Controllers;

use App\Models\Cardattachmentpayment;
use Illuminate\Http\Request;

class CardattachmentpaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cardattachmentpayment = Cardattachmentpayment::with('cardNumbers','unitNumbers','clientNumbers')->get();
        return view('cardattachmentpayments.index',['cardattachmentpayment'=>$cardattachmentpayment]);
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
     * @param  \App\Models\Cardattachmentpayment  $cardattachmentpayment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cardattachmentpayment = Cardattachmentpayment::with('cardNumbers','unitNumbers','clientNumbers')->find($id);
        return view('cardattachmentpayments.cardattachementpayment',['cardattachmentpayment'=>$cardattachmentpayment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cardattachmentpayment  $cardattachmentpayment
     * @return \Illuminate\Http\Response
     */
    public function edit(Cardattachmentpayment $cardattachmentpayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cardattachmentpayment  $cardattachmentpayment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cardattachmentpayment $cardattachmentpayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cardattachmentpayment  $cardattachmentpayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cardattachmentpayment $cardattachmentpayment)
    {
        //
    }
}

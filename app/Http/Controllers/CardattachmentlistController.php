<?php

namespace App\Http\Controllers;

use App\Models\Cardattachmentlist;
use App\Models\Cardattachmentpayment;
use Illuminate\Http\Request;

class CardattachmentlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cardattachmentlist = Cardattachmentpayment::with('cardNumbers','unitNumbers','clientNumbers')->get();
        return view('cardattachmentlists.index',['cardattachmentlist'=>$cardattachmentlist]);
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
     * @param  \App\Models\Cardattachmentlist  $cardattachmentlist
     * @return \Illuminate\Http\Response
     */
    public function show(Cardattachmentlist $cardattachmentlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cardattachmentlist  $cardattachmentlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Cardattachmentlist $cardattachmentlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cardattachmentlist  $cardattachmentlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cardattachmentlist $cardattachmentlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cardattachmentlist  $cardattachmentlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cardattachmentlist $cardattachmentlist)
    {
        //
    }
}

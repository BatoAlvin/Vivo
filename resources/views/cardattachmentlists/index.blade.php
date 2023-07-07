@extends('layouts.navigation')

@section('content')
<link href="{{ asset('css\boot.css') }}" rel="stylesheet">

<script src="{{ asset('js\jquery.js') }}"></script>
<script src="{{ asset('js\popper.js') }}"></script>
<script src="{{ asset('js\npm.js') }}"></script>

    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h5>Card Attachment List </h5>
            </div>
        </div>

    </div>
    <!-- row -->


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Card Number</th>
                                    <th>Unit Name</th>
                                    <th>Client Name</th>
                                    <th>Payments</th>
                                    <th>Date</th>
                                    <th>Created At</th>
                                    <th>View</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cardattachmentlist as $cardattachmentlists)
                                    <tr>
                                        <td>{{ $cardattachmentlists->cardNumbers ? $cardattachmentlists->cardNumbers->cardnumber : '-' }}</td>
                                        <td>{{ $cardattachmentlists->unitNumbers ? $cardattachmentlists->unitNumbers->unit_name : '-' }}</td>
                                        <td>{{ $cardattachmentlists->clientNumbers ? $cardattachmentlists->clientNumbers->clientname : '-' }}</td>
                                        <td>{{ number_format($cardattachmentlists->amountpaidx) }}</td>
                                        <td>{{ $cardattachmentlists?$cardattachmentlists?->date:'-' }}</td>

                                        <td>{{ $cardattachmentlists->created_at }}</td>


                                        <td>
                                            <a href="{{url('cardattachmentlist/'.$cardattachmentlists->id )}}" <button class="btn btn-success"><i class="fa fa-eye" style="color:#fff;"></i></button></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

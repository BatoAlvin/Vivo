@extends('layouts.navigation')

@section('content')
    <link href="{{ asset('css\boot.css') }}" rel="stylesheet">

    <script src="{{ asset('js\jquery.js') }}"></script>
    <script src="{{ asset('js\popper.js') }}"></script>
    <script src="{{ asset('js\npm.js') }}"></script>

    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h5>Attachments Summary </h5>
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
                                    <th>Amount</th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($card as $cards)
                                    <tr>
                                       <td> {{$cards->card}}</td>
                                        <td>{{ number_format($cards->total)}}</td>

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

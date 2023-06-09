@extends('layouts.navigation')

@section('content')
    <link href="{{ asset('css\boot.css') }}" rel="stylesheet">

    <script src="{{ asset('js\jquery.js') }}"></script>
    <script src="{{ asset('js\popper.js') }}"></script>
    <script src="{{ asset('js\npm.js') }}"></script>

    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h5>Attachments </h5>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" class="mt-3"
                style="float: right;margin-right:10px;"><i class="fa fa-plus">Add Card Attachment</i></button>

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New Card Unit</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <form action="{{ route('cardattachment.store') }}" method='post'>
                                <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />

                                <div class="form-group">
                                    <label for="recipient-name" class="coll">Card Number</label>
                                    <select class="form-control" name="card_id" id="source-field" required>
                                        <option selected disabled value=''>Choose Card Number</option>
                                        @foreach ($card as $cards)
                                            <option value="{{ $cards->id }}">{{ $cards->cardnumber }}</option>
                                            <div id="editor-container" class="mb-1"></div>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    @if (!empty($datas))
                                        {{ $datas }}
                                    @endif
                                    <label for="recipient-name" class="coll">Unit Name</label>
                                    <select class="form-control" name="unit_id" id="sub_avail" required>
                                        <option selected disabled value=''>Choose Unit</option>
                                        @if (!empty($datas))
                                            <option value="{{ $option->value }}">{{ $option->text }} {{ $option->value }}
                                                Alvin</option>
                                            <div id="editor-container" class="mb-1"></div>
                                        @endif

                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="recipient-name" class="coll">Client</label>
                                    <select class="form-control" name="client_id">
                                        <option selected disabled value=''>Choose Client</option>
                                        @foreach ($client as $clients)
                                            <option value="{{ $clients->id }}">{{ $clients->clientname }}</option>
                                            <div id="editor-container" class="mb-1"></div>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="recipient-name" class="coll">Amount</label>
                                  <input type="number" name="amount" required/>
                                </div>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"
                                        value="Reset">Close</button>
                                    <button type="submit" class="btn btn-primary">Add Unit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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
                                    <th>Count</th>
                                    <th>Amount</th>
                                    <th>View</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cardattachment as $cardattachments)
                                    <tr>
                                        <td>{{ $cardattachments->cardNumber ? $cardattachments->cardNumber->cardnumber : '-' }}
                                        </td>
                                        <td>{{ $cardattachments->unitNumber ? $cardattachments->unitNumber->unit_name : '-' }}
                                        </td>
                                        <td>{{ $cardattachments->clientNumber ? $cardattachments->clientNumber->clientname : '-' }}
                                        </td>
                                        <td>{{ $cardattachments->counters ? $cardattachments->counters->count() : '-' }}
                                        </td>

                                            <td>{{ $cardattachments->amount }}</td>



                                        <td>
                                            <a href="{{ url('cardattachment/' . $cardattachments->id) }}" <button
                                                class="btn btn-success"><i class="fa fa-money"
                                                    style="color:#fff;"></i></button></a>
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#exampleModal{{ $cardattachments->id }}"><i
                                                    class='fa fa-edit'>
                                                </i>
                                            </button>


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

    <script>
        // Fetching buying price from products table
        document.getElementById('source-field').addEventListener('change', function() {
            var sourceField = this.value;
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '/quantityavailable/' + sourceField, true);
            xhr.onload = function() {
                if (this.status === 200) {
                    console.log('datas', this.responseText);
                    // alert(this.responseText)
                    var datas = JSON.parse(this.responseText); // Assuming the response is in JSON format
                    var selectField = document.getElementById('sub_avail');

                    // Clear existing options
                    selectField.innerHTML = '';

                    // Create and append new options based on fetched records
                    datas.forEach(function(data) {
                        var option = document.createElement('option');
                        option.value = data.unitnumber.id; // Set the value of the option
                        // alert(data.id)
                        option.text = data.unitnumber.unit_name; // Set the text displayed in the option
                        selectField.appendChild(option);
                    });
                }
            };
            xhr.send();
        });
    </script>


    {{-- <script>
        //Fetching buying price from products table
        document.getElementById('source-field').addEventListener('change', function() {
            var sourceField = this.value;
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '/quantityavailable/' + sourceField, true);
            xhr.onload = function() {
                if (this.status === 200) {
                    var datas = this.responseText;
                    // console.log(datas);
                    // document.getElementById('sub_avail').value = datas;
                }
            };
            xhr.send();
        });
    </script> --}}
@endsection

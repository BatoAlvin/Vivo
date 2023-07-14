

@extends('layouts.navigation')

@section('content')

<div class="row page-titles mx-0">
 <div class="col-sm-6 p-md-0">

 </div>
 <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
     <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="javascript:void(0)">App</a></li>
         <li class="breadcrumb-item active"><a href="javascript:void(0)">Card Attachment</a></li>
     </ol>
 </div>
</div>

<div class="row">

 <div class="col-lg-12">
     <div class="card">
         <div class="card-body">
             <div class="profile-tab">

                <form action="{{ route('enroll',$payment['id'])}}" method='post'>


                    <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />


        <div class="col-lg-3 col-sm-6 col-12">
           <div class="form-group">
            <label for="recipient-name">Card Number</label>
            <input type="text" class="form-control"  name="cardnumberp" value="{{ $payment->cardNumber->cardnumber }}" required />
          </div>
        </div>


        <div class="col-lg-3 col-sm-6 col-12">
            <div class="form-group">
             <label for="recipient-name">Unit Name</label>
             <input type="text" class="form-control"  name="unitnamex" value="{{ $payment->unitNumber->unit_name }}" required />
           </div>
         </div>


        <div class="col-lg-3 col-sm-6 col-12">
            <div class="form-group">
             <label for="recipient-name">Description</label>
             <input type="text" class="form-control"  name="descriptionx" value="{{ $payment->unitNumber->description }}" required />
           </div>
         </div>


        <div class="col-lg-3 col-sm-6 col-12">
            <div class="form-group">
             <label for="recipient-name">Client Name</label>
             <input type="text" class="form-control"  name="clientnamex" value="{{ $payment->clientNumber->clientname }}" required />
           </div>
         </div>

         <div class="col-lg-3 col-sm-6 col-12">
            <div class="form-group">
             <label for="recipient-name">Amount </label>
             <input type="text" class="form-control"  name="amountx" id="amounts" value="{{ $payment->amount }}" required />
           </div>
         </div>


        <div class="col-lg-3 col-sm-6 col-12">
            <div class="form-group">
             <label for="recipient-name">Next Date</label>
             <input type="date" class="form-control"  name="date" required />
           </div>
         </div>


         <div class="col-lg-3 col-sm-6 col-12">
            <div class="form-group">
             <label for="recipient-name">Amount</label>
             <input type="text" class="form-control"  name="amountpaidx" id="change" onkeyup="mult(this.value);" required />
           </div>
         </div>


         <div class="col-lg-3 col-sm-6 col-12">
            <div class="form-group">
             <label for="recipient-name">Balance</label>
             <input type="text" class="form-control" id="changetotal" name="balance" readonly />
           </div>
         </div>


         <div class="col-lg-12">
          <a href="/cardattachment" class="btn btn-secondary">Back </a>
        <button type="submit" class="btn btn-primary">Add Payment
            </button>
            </div>
         </form>
             </div>
         </div>
     </div>
 </div>
</div>


<script>
    function mult(value){
        var dt = value-document.getElementById('amounts').value;
        document.getElementById('changetotal').value=dt;

    }

</script>
     @endsection


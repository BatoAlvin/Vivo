

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

                <form action="" method='post'>


                    <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />


        <div class="col-lg-3 col-sm-6 col-12">
           <div class="form-group">
            <label for="recipient-name">Card Number</label>
            <input type="text" class="form-control"  name="cardnumberp" value="{{ $cardattachmentpayment->cardNumbers->cardnumber }}" required />
          </div>
        </div>


        <div class="col-lg-3 col-sm-6 col-12">
            <div class="form-group">
             <label for="recipient-name">Unit Name</label>
             <input type="text" class="form-control"  name="unitnamex" value="{{ $cardattachmentpayment->unitNumbers->unit_name }}" required />
           </div>
         </div>


        <div class="col-lg-3 col-sm-6 col-12">
            <div class="form-group">
             <label for="recipient-name">Description</label>
             <input type="text" class="form-control"  name="descriptionx" value="{{ $cardattachmentpayment->unitNumbers->description }}" required />
           </div>
         </div>


        <div class="col-lg-3 col-sm-6 col-12">
            <div class="form-group">
             <label for="recipient-name">Client Name</label>
             <input type="text" class="form-control"  name="clientnamex" value="{{ $cardattachmentpayment->clientNumbers->clientname }}" required />
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
             <input type="text" class="form-control"  name="amountpaidx" required />
           </div>
         </div>

         <div class="col-lg-12">
            <button type="reset" class="btn btn-danger"
            value="Reset">Close</button>
        <button type="submit" class="btn btn-primary">Add Payment
            </button>
            </div>
         </form>
             </div>
         </div>
     </div>
 </div>
</div>

     @endsection


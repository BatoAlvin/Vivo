

@extends('layouts.navigation')

@section('content')

<div class="row page-titles mx-0">
 <div class="col-sm-6 p-md-0">

 </div>
 <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
     <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="javascript:void(0)">App</a></li>
         <li class="breadcrumb-item active"><a href="javascript:void(0)">Project</a></li>
     </ol>
 </div>
</div>

<div class="row">

 <div class="col-lg-12">
     <div class="card">
         <div class="card-body">
             <div class="profile-tab">

                 <div class="media pt-3">
                     <h5 class="mr-3"> Project  :</h5>
                     <div class="media-body">
                         <h5 class="m-b-5">{{ $cardattachmentlist->cardNumbers?$cardattachmentlist->cardNumbers->amountpaidx:'-'}}</h5>
                     </div>
                 </div>


                 <div class="media pt-3">
                    <h5 class="mr-3"> Project  :</h5>
                    <div class="media-body">
                        <h5 class="m-b-5">{{ $cardattachmentlist->cardNumbers?$cardattachmentlist->cardNumbers->cardnumber:'-'}}</h5>
                    </div>
                </div>


                 <a class="btn btn-primary mt-4" href="/cardattachmentlist">Back</a>


             </div>
         </div>
     </div>
 </div>
</div>

     @endsection


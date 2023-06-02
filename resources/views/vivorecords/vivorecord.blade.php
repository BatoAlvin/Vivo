

   @extends('layouts.navigation')

   @section('content')

   <div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">

    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">App</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Vivo Record</a></li>
        </ol>
    </div>
</div>

<div class="row">

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="profile-tab">

                    <div class="media pt-3">
                        <h5 class="mr-3"> Project Name :</h5>
                        <div class="media-body">
                            <h5 class="m-b-5">{{ $vivo->project->project_name}}</h5>
                        </div>
                    </div>

                    <div class="media pt-3">
                        <h5 class="mr-3"> Product :</h5>
                        <div class="media-body">
                            <h5 class="m-b-5">{{ $vivo->product->product_name}}</h5>
                        </div>
                    </div>


                    <div class="media pt-3">
                        <h5 class="mr-3"> User :</h5>
                        <div class="media-body">
                            <h5 class="m-b-5">{{ $vivo->client->clientname}}</h5>
                        </div>
                    </div>



                    <div class="media pt-3">
                        <h5 class="mr-3"> Plates :</h5>
                        <div class="media-body">
                            <h5 class="m-b-5">{{ $vivo->registration->registration_name}}</h5>
                        </div>
                    </div>


                    <div class="media pt-3">
                        <h5 class="mr-3"> Description :</h5>
                        <div class="media-body">
                            <h5 class="m-b-5">{{ $vivo->description}}</h5>
                        </div>
                    </div>


                    <div class="media pt-3">
                        <h5 class="mr-3"> Litres :</h5>
                        <div class="media-body">
                            <h5 class="m-b-5">{{ $vivo->litres}}</h5>
                        </div>
                    </div>


                    <div class="media pt-3">
                        <h5 class="mr-3"> Unit Cost :</h5>
                        <div class="media-body">
                            <h5 class="m-b-5">{{ $vivo->unit_cost}}</h5>
                        </div>
                    </div>


                    <div class="media pt-3">
                        <h5 class="mr-3"> Purchase:</h5>
                        <div class="media-body">
                            <h5 class="m-b-5">{{ $vivo->purchases}}</h5>
                        </div>
                    </div>


                    <a class="btn btn-primary mt-4" href="/vivorecord">Back</a>


                </div>
            </div>
        </div>
    </div>
</div>

        @endsection


@extends('layouts.navigation')

@section('content')

<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Dropdown button
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
  </div>
</div>


    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="stat-widget-two card-body">
                    <div class="stat-content">
                        <div class="stat-text">Cards </div>
                        <div class="stat-digit"> <i class="fa fa-users"></i>{{$card}}</div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-success w-85" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-sm-6">
        <div class="card">
            <div class="stat-widget-two card-body">
                <div class="stat-content">
                    <div class="stat-text">Cards Out </div>
                    <div class="stat-digit"> <i class="fa fa-users"></i>{{$cardout}}</div>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-success w-85" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-sm-6">
        <div class="card">
            <div class="stat-widget-two card-body">
                <div class="stat-content">
                    <div class="stat-text">Cards Available </div>
                    <div class="stat-digit"> <i class="fa fa-users"></i>{{$card-$cardout}}</div>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-success w-85" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-lg-3 col-sm-6">
        <div class="card">
            <div class="stat-widget-two card-body">
                <div class="stat-content">
                    <div class="stat-text">Clients</div>
                    <div class="stat-digit"> <i class="fa fa-money"></i>{{$client}}</div>
                    {{-- <h5 class="m-b-5">{{ number_format($saving->amount) }}</h5> --}}
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-primary w-75" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
    </div>
        <!-- /# column -->
    </div>
    @endsection

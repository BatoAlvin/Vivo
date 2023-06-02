
@extends('layouts.navigation')

@section('content')
<style>
    .coll{
color:#000;
    }

    .error{
    color:red;
    font-style:italic;
}
</style>
<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
     <h5>Vivo Records</h5>

     <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
        <div class="btn-group" role="group">
          <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Filter
          </button>
          <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
            <a onclick="window.location='{{ url('filter/1') }}'" class="dropdown-item" href="#">Today</a>
            <a onclick="window.location='{{ url('filter/2') }}'" class="dropdown-item" href="#">Last 7 Days</a>
            <a onclick="window.location='{{ url('filter/3') }}'" class="dropdown-item" href="#">Last Month</a>
          </div>
        </div>
      </div>


        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" class="mt-3" style="float: right;margin-right:10px;"><i class="fa fa-plus">Add Records</i></button>


     {{-- <a href="{{ route('exportfamilymember')}}" class="btn btn-success"><i class="fa fa-download" style="color:#fff;">Excel</i></a> --}}

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">New Record</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('vivorecord.store')}}" method='post'>
                                 <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />

                                 <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Project</label>
                                    <select class="form-control" name="project_id" required>
                                        <option selected disabled value=''>Choose Project</option>
                                       @foreach($project as $projects)
                                       <option value="{{ $projects->id}}">{{ $projects->project_name}}</option>
                                       <div id="editor-container" class="mb-1"></div>
                                       @endforeach
                                       </select>
                                  </div>


                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Product</label>
                                    <select class="form-control" name="product_id" required>
                                        <option selected disabled value=''>Choose Product</option>
                                       @foreach($product as $products)

                                       <option value="{{ $products->id}}">{{ $products->product_name}}</option>
                                       <div id="editor-container" class="mb-1"></div>
                                       @endforeach
                                       </select>
                                  </div>



                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Cardnumber</label>
                                    <select class="form-control" name="cardholder_id" required>
                                        <option selected disabled value=''>Choose Cardnumber</option>
                                       @foreach($card as $cards)
                                       <option value="{{ $cards->id}}">{{ $cards->cardnumber}}</option>
                                       <div id="editor-container" class="mb-1"></div>
                                       @endforeach
                                       </select>
                                  </div>


                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">User</label>
                                    <select class="form-control" name="client_id" required>
                                        <option selected disabled value=''>Choose User</option>
                                       @foreach($client as $clients)
                                       <option value="{{ $clients->id}}">{{ $clients->clientname}}</option>
                                       <div id="editor-container" class="mb-1"></div>
                                       @endforeach
                                       </select>
                                  </div>


                                  <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Plates</label>
                                    <select class="form-control" name="registration_id" required>
                                        <option selected disabled value=''>Choose Registration</option>
                                       @foreach($registration as $registrations)
                                       <option value="{{ $registrations->id}}">{{ $registrations->registration_name}}</option>
                                       <div id="editor-container" class="mb-1"></div>
                                       @endforeach
                                       </select>
                                  </div>




                       <div class="form-group">
                         <label for="recipient-name" class="coll"> Litres</label>
                         <input type="number" class="form-control"  name="litres" id="litre" required>
                       </div>




                       <div class="form-group">
                         <label for="recipient-name" class="coll">Unit Cost</label>
                         <input type="number" onblur="calculateReturn(this.value)" class="form-control"  name="unit_cost" id="unitcost" required>
                       </div>


                       <script>
                        function calculateReturn(){
                        var litres = document.getElementById("litre").value;
                        var unit = document.getElementById("unitcost").value;
                        var retuns = litres*unit;
                        document.getElementById("purchase").value = retuns;
                                        }
                      </script>



                       <div class="form-group">
                        <label for="recipient-name" class="coll">Total Purchases</label>
                        <input type="number" readonly class="form-control"  name="purchases" id="purchase" required>
                      </div>


                      <div class="form-group">
                        <label for="recipient-name" class="coll">Description</label>
                        <input type="text" class="form-control"  name="description" required>
                      </div>



                        <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal" value="Reset" onclick="clearText()">Close</button>
                      <button type="submit" class="btn btn-primary">Add Record</button>
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
                            <h3>Records for {{$heading}}</h3>
                            <tr>
                                <th>No</th>
                                <th>Project Name</th>
                                <th>Product</th>
                                <th>Client</th>
                                <th>Registration Plates</th>
                                <th>Description</th>
                                <th>Litres</th>
                                <th>Unit Cost</th>
                                <th>Purchase</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vivorecord as $vivorecords)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$vivorecords->project->project_name}}</td>
                                <td>{{$vivorecords->product->product_name}}</td>
                                <td>{{$vivorecords->client->clientname}}</td>
                                <td>{{$vivorecords->registration->registration_name}}</td>
                                <td>{{$vivorecords->description}}</td>
                                <td>{{$vivorecords->litres}}</td>
                                <td>{{$vivorecords->unit_cost}}</td>
                                <td>{{$vivorecords->purchases}}</td>
                                </td>


                                <td>
                                    <a href="{{url('vivorecord/'.$vivorecords->id )}}"<button class="btn btn-success"><i class="fa fa-eye" style="color: #fff;"></i></button></a>

                                    <button type="button" class="btn btn-primary" data-toggle="modal"  data-target="#exampleModal{{ $vivorecords->id }}"><i class='fa fa-edit'>
                                    </i>
                                    </button>

                                    <div class="modal fade" id="exampleModal{{ $vivorecords->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                              <form action="{{ route('vivorecord.update', [$vivorecords->id])}}" method='post'>

                                                @method('PUT')
                                                         <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />

                                                         <div class="form-group">
                                                            <label for="recipient-name" class="col-form-label">Project Name</label>
                                                            <select class="form-control" name="project_id" id="example-getting-started">
                                                               <option selected disabled value=''>Choose Project</option>
                                                               @foreach($project as $projects)
                                                               <option @if ($projects->id == $vivorecords->project_id)
                                                                  selected
                                                               @endif value="{{ $projects->id}}">{{ $projects->project_name}}</option>
                                                                @endforeach
                                                                <div id="editor-container" class="mb-1"></div>
                                                              </select>
                                                           </div>


                                                           <div class="form-group">
                                                            <label for="recipient-name" class="col-form-label">Product</label>
                                                            <select class="form-control" name="product_id" id="example-getting-started">
                                                               <option selected disabled value=''>Choose Product</option>
                                                               @foreach($product as $products)
                                                               <option @if ($products->id == $vivorecords->product_id)
                                                                  selected
                                                               @endif value="{{ $products->id}}">{{ $products->product_name}}</option>
                                                                @endforeach
                                                                <div id="editor-container" class="mb-1"></div>
                                                              </select>
                                                           </div>



                                                           <div class="form-group">
                                                            <label for="recipient-name" class="col-form-label">User</label>
                                                            <select class="form-control" name="client_id" id="example-getting-started">
                                                               <option selected disabled value=''>Choose Product</option>
                                                               @foreach($client as $clients)
                                                               <option @if ($clients->id == $vivorecords->client_id)
                                                                  selected
                                                               @endif value="{{ $clients->id}}">{{ $clients->clientname}}</option>
                                                                @endforeach
                                                                <div id="editor-container" class="mb-1"></div>
                                                              </select>
                                                           </div>


                                                           <div class="form-group">
                                                            <label for="recipient-name" class="col-form-label">Plates</label>
                                                            <select class="form-control" name="registration_id" id="example-getting-started">
                                                               <option selected disabled value=''>Choose Product</option>
                                                               @foreach($registration as $registrations)
                                                               <option @if ($registrations->id == $vivorecords->registration_id)
                                                                  selected
                                                               @endif value="{{ $registrations->id}}">{{ $registrations->registration_name}}</option>
                                                                @endforeach
                                                                <div id="editor-container" class="mb-1"></div>
                                                              </select>
                                                           </div>


                                                           <div class="form-group">
                                                            <label for="recipient-name" class="col-form-label">Description</label>
                                                            <input type="text" class="form-control"  name="description" required value="{{$vivorecords->description}}">
                                                          </div>

                                                <div class="modal-footer">
                                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                              <button type="submit" class="btn btn-primary">Update Record</button>
                                            </div>
                                              </form>
                                            </div>
                                          </div>
                                        </div>
                                      </div>




                                      <form action="{{route('vivorecord.destroy', $vivorecords->id)}}" method="post">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">

                                        <button class="btn btn-danger"  onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>

                                    </form>
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

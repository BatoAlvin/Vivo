
@extends('layouts.navigation')

@section('content')

<div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
     <h5>Units </h5>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" class="mt-3" style="float: right;margin-right:10px;"><i class="fa fa-plus">Add Unit</i></button>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">New Unit</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('unit.store')}}" method='post'>


                                 <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />



                        <div class="form-group">
                         <label for="recipient-name" class="coll">Unit Name</label>
                         <input type="text" class="form-control"  name="unit_name"  required />
                       </div>


                        <div class="form-group">
                         <label for="recipient-name" class="coll">Description</label>
                         <input type="text" class="form-control"  name="description" required />
                       </div>



                        <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal" value="Reset">Close</button>
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
                                <th>Unit Name</th>
                                <th>Description</th>
                                <th>View</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($unit as $units)
                            <tr>
                                <td>{{$units->unit_name}}</td>
                                <td>{{$units->description}}</td>
                                </td>


                                <td>
                                    <div style="display: flex">
                                    <a href="{{url('unit/'.$units->id )}}" style="margin-right: 10px;" <button class="btn btn-success"><i class="fa fa-eye" style="color:#fff;"></i></button></a>
                                    <button type="button" class="btn btn-primary" style="margin-right: 10px;" data-toggle="modal"  data-target="#exampleModal{{ $units->id }}"><i class='fa fa-edit'>
                                       </i>
                                       </button>

                                       <div class="modal fade" id="exampleModal{{ $units->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                           <div class="modal-dialog" role="document">
                                             <div class="modal-content">
                                               <div class="modal-header">
                                                 <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                   <span aria-hidden="true">&times;</span>
                                                 </button>
                                               </div>
                                               <div class="modal-body">
                                                 <form action="{{ route('unit.update', [$units->id])}}" method='post'>

                                                   @method('PUT')
                                                            <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />

                                                   <div class="form-group">
                                                     <label for="recipient-name" class="col-form-label">Unit Name</label>
                                                     <input type="text" class="form-control"  name="unit_name" required value="{{$units->unit_name}}">
                                                   </div>


                                                   <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Description</label>
                                                    <input type="text" class="form-control"  name="description" required value="{{$units->description}}">
                                                  </div>


                                                   <div class="modal-footer">
                                                 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                 <button type="submit" class="btn btn-primary">Update User</button>
                                               </div>
                                                 </form>
                                               </div>
                                             </div>
                                           </div>
                                         </div>



                                      <form action="{{route('unit.destroy', $units->id)}}" method="post">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-danger"  onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </div>
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

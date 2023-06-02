
@extends('layouts.navigation')

@section('content')

<script>
    function clearTexts()
{
    document.getElementById('nayei').value = "";
    document.getElementById('amountid').value = "";
    document.getElementById('descriptionid').value = "";
    document.getElementById('dateid').value = "";
}

</script>

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
     <h5>Project </h5>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModall" class="mt-3" style="float: right;margin-right:10px;"><i class="fa fa-plus">Add Project</i></button>
     {{-- <a href="{{ route('exportworkingclass')}}" class="btn btn-success"><i class="fa fa-download" style="color:#fff;">Excel</i></a> --}}

        <div class="modal fade" id="exampleModall" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">New Project</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('project.store')}}" method='post'>


                                 <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />



                        <div class="form-group">
                         <label for="recipient-name" class="coll">Project Name</label>
                         <input type="text" class="form-control"  name="project_name" id="neyi" required />
                       </div>



                        <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal" value="Reset" onclick="clearTexts()">Close</button>
                      <button type="submit" class="btn btn-primary">Add Project</button>
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
                                <th>Project Name</th>

                                <th>View</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($project as $projects)
                            <tr>
                                <td>{{$projects->project_name}}</td>

                                </td>


                                <td>
                                    <a href="{{url('project/'.$projects->id )}}"<button class="btn btn-success"><i class="fa fa-eye" style="color:#fff;"></i></button></a>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"  data-target="#exampleModal{{ $projects->id }}"><i class='fa fa-edit'>
                                       </i>
                                       </button>

                                       <div class="modal fade" id="exampleModal{{ $projects->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                           <div class="modal-dialog" role="document">
                                             <div class="modal-content">
                                               <div class="modal-header">
                                                 <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                   <span aria-hidden="true">&times;</span>
                                                 </button>
                                               </div>
                                               <div class="modal-body">
                                                 <form action="{{ route('project.update', [$projects->id])}}" method='post'>

                                                   @method('PUT')
                                                            <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />

                                                   <div class="form-group">
                                                     <label for="recipient-name" class="col-form-label">Name</label>
                                                     <input type="text" class="form-control"  name="project_name" required value="{{$projects->project_name}}">
                                                   </div>





                                                   <div class="modal-footer">
                                                 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                 <button type="submit" class="btn btn-primary">Update Project</button>
                                               </div>
                                                 </form>
                                               </div>
                                             </div>
                                           </div>
                                         </div>



                                      <form action="{{route('project.destroy', $projects->id)}}" method="post">
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

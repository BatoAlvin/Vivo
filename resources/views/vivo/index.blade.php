
@extends('layouts.navigation')

@section('content')

<script>
    function clearTexts()
{
    document.getElementById('nameid').value = "";
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
     <h5>Clients </h5>


        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" class="mt-3" style="float: right;margin-right:10px;"><i class="fa fa-plus">Add Client</i></button>
     {{-- <a href="{{ route('exportsaving')}}" class="btn btn-success"><i class="fa fa-download" style="color:#fff;">Excel</i></a> --}}

        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" class="mt-3" style="float: right;margin-right:10px;"><i class="fa fa-plus">Add Saving</i></button> --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">New Client</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('vivo.store')}}" method='post'>


                                 <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />

                                 <div class="form-group">
                                  <label for="recipient-name" class="coll">Name</label>
                                  <select class="form-control" name="client_id" id="source-field" required>
                                    <option selected disabled value=''>Choose Name</option>
                                        @foreach($client as $clients)

                                        <option value="{{ $clients->id}}">{{ $clients->clientname}}</option>
                                        <div id="editor-container" class="mb-1"></div>
                                        @endforeach
                                   </select>
                                </div>



                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Units</label>
                                    <input type="text" class="form-control" name="units" id="sub_avail" readonly>
                                </div>


                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1" style="font-weight:bolder;">Allocate Units</label>
                                    <input type="number" class="form-control" name="unit_id" id="">
                                </div>



                                <div class="form-group">
                                    <label for="recipient-name" class="coll">Name</label>
                                    <select class="form-control" name="card_id" required>
                                      <option selected disabled value=''>Choose Card Number</option>
                                          @foreach($card as $cards)

                                          <option value="{{ $cards->id}}">{{ $cards->cardnumber}}</option>
                                          <div id="editor-container" class="mb-1"></div>
                                          @endforeach
                                     </select>
                                  </div>






                        <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal" value="Reset" onclick="clearTexts()">Close</button>
                      <button type="submit" class="btn btn-primary">Add Client</button>
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
                                <th>No</th>
                                <th>Client</th>
                                <th>Card Number</th>
                                <th>Units</th>

                                <th>View</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($vivo as $vivos)
                            <tr>
                              <td>{{$loop->iteration}}</td>
                                <td>
                                    {{$vivos->client->clientname}}</td>

                                <td>{{$vivos->card->cardnumber}}</td>
                                <td>{{$vivos->unit_id}}</td>

                                </td>


                                <td>
                                    <div style="display:flex;">
                                    <a href="{{url('vivo/'.$vivos->id )}}"<button class="btn btn-success" style="margin-right:10px;"><i class="fa fa-eye" style="color:#fff;"></i></button></a>
                                    <button type="button" class="btn btn-primary" style="margin-right:10px;" data-toggle="modal"  data-target="#exampleModal{{ $vivos->id }}"><i class='fa fa-edit'>
                                       </i>
                                       </button>

                                       <div class="modal fade" id="exampleModal{{ $vivos->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                           <div class="modal-dialog" role="document">
                                             <div class="modal-content">
                                               <div class="modal-header">
                                                 <h5 class="modal-title" id="exampleModalLabel">Edit {{ $vivos->client->clientname }}</h5>
                                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                   <span aria-hidden="true">&times;</span>
                                                 </button>
                                               </div>
                                               <div class="modal-body">
                                                 <form action="{{ route('vivo.update', [$vivos->id])}}" method='post'>

                                                   @method('PUT')
                                                            <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />

                                                   <div class="form-group">
                                                     <label for="recipient-name" class="col-form-label">Client</label>
                                                     <input type="text" class="form-control"  name="name" required value="{{$vivos->client->clientname}}">
                                                   </div>

                                                   <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Card Number</label>
                                                    <input type="text" class="form-control"  name="amount" required value="{{$vivos->card->cardnumber}}">
                                                  </div>




                                                   <div class="modal-footer">
                                                 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                 <button type="submit" class="btn btn-primary">Update</button>
                                               </div>
                                                 </form>
                                               </div>
                                             </div>
                                           </div>
                                         </div>

                                         <form action="{{route('vivo.destroy', $vivos->id)}}" method="post">
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger" style="margin-right:10px;" onclick="return confirm('Are you sure?')"><i class="fa fa-bug"></i></button>
                                            </form>


                                      {{-- <form action="{{route('vivo.destroy', $vivos->id)}}" method="post">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-danger"  onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                                        </form> --}}
                                    </div>



                                    <button type="button" class="btn btn-primary" style="margin-right:10px;" data-toggle="modal"  data-target="#exampleModall{{ $vivos->id }}"><i class='fa fa-edit'>
                                    gh</i>
                                    </button>

                                    <div class="modal fade" id="exampleModall{{ $vivos->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Edit {{ $vivos->client->clientname }}</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                              <form action="useunits/{{ $vivos->id }}" method='post'>

                                                @method('PUT')
                                                         <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />

                                                <div class="form-group">
                                                  <label for="recipient-name" class="col-form-label">Unit Name</label>
                                                  <input type="text" class="form-control"  name="units">
                                                </div>





                                                <div class="modal-footer">
                                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                              <button type="submit" class="btn btn-primary">Update Unit Now</button>
                                            </div>
                                              </form>
                                            </div>
                                          </div>
                                        </div>
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
<script>
    //Fetching buying price from products table
document.getElementById('source-field').addEventListener('change', function() {
    var sourceField = this.value;
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '/quantityavailable/' + sourceField, true);
    xhr.onload = function() {
        if (this.status === 200) {
            var datas = JSON.parse(this.responseText);
            document.getElementById('sub_avail').value = datas;
        }
    };
    xhr.send();
});
</script>

 @endsection

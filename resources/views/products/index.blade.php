
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
     <h5>Product </h5>
        </div>
    </div>
    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalli" class="mt-3" style="float: right;margin-right:10px;"><i class="fa fa-plus">Add Product</i></button>
     {{-- <a href="{{ route('exportworkingclass')}}" class="btn btn-success"><i class="fa fa-download" style="color:#fff;">Excel</i></a> --}}

        <div class="modal fade" id="exampleModalli" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">New Product</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('product.store')}}" method='post'>


                                 <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />



                        <div class="form-group">
                         <label for="recipient-name" class="coll">Product Name</label>
                         <input type="text" class="form-control"  name="product_name" id="" required />
                       </div>



                        <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal" value="Reset" onclick="clearTexts()">Close</button>
                      <button type="submit" class="btn btn-primary">Add Product</button>
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
                                <th>Product Name</th>

                                <th>View</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product as $products)
                            <tr>
                                <td>{{$products->product_name}}</td>

                                </td>


                                <td>
                                    <a href="{{url('product/'.$products->id )}}"<button class="btn btn-success"><i class="fa fa-eye" style="color:#fff;"></i></button></a>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"  data-target="#exampleModdal{{ $products->id }}"><i class='fa fa-edit'>
                                       </i>
                                       </button>

                                       <div class="modal fade" id="exampleModdal{{ $products->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                           <div class="modal-dialog" role="document">
                                             <div class="modal-content">
                                               <div class="modal-header">
                                                 <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                   <span aria-hidden="true">&times;</span>
                                                 </button>
                                               </div>
                                               <div class="modal-body">
                                                 <form action="{{ route('product.update', [$products->id])}}" method='post'>

                                                   @method('PUT')
                                                            <input id='token' type="hidden" name="_token" value="{{ csrf_token() }}" />

                                                   <div class="form-group">
                                                     <label for="recipient-name" class="col-form-label">Product Name</label>
                                                     <input type="text" class="form-control"  name="product_name" required value="{{$products->product_name}}">
                                                   </div>





                                                   <div class="modal-footer">
                                                 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                 <button type="submit" class="btn btn-primary">Update Product</button>
                                               </div>
                                                 </form>
                                               </div>
                                             </div>
                                           </div>
                                         </div>



                                      <form action="{{route('product.destroy', $products->id)}}" method="post">
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

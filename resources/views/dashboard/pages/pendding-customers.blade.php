@extends('dashboard.layouts.master')
@section('content')
<!-- Breadcrumb-->
    <div class="breadcrumb-holder">
         <div class="container-fluid">
             <ul class="breadcrumb">
                 <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                 <li class="breadcrumb-item active">Customers</li>
             </ul>
         </div>
     </div>
     <section class="statistics">
         <div class="container-fluid">
             <div class="row">
                 <div class="col-sm-12 col-md-6" >
                     <header><h1 class="h3 display"></h1></header>
                 </div>
                 <div class="col-sm-12 col-md-6 mt-4">
                     <a  href="#" class="btn btn-primary offset-md-9" data-toggle="modal" data-target="#createCustomerModal">Create</a>
                     <!-- <a v-if="profiles" :to="{name:'about.update',params:{id:profiles.id}}" class="btn btn-success offset-md-9">Update</a> -->
                 </div>
             </div>
            <section v-else class="content">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                            <h4>Pendding Customers Table </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped myTable data-table">
                                        <thead>
                                            <tr>
                                            <th>SL</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Alternate No</th>
                                            <th>Address</th>
                                            <th>Pin Code</th>
                                            <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(count( $customers)>0)
                                                @foreach($customers as $key=>$customer)
                                                <tr>
                                                    <th>{{$key+1}}</th>
                                                    <!-- <td><img src="{{asset($customer->image) ?? asset('/backend/img/avatar/avatarM.png')}}" alt="" class="img-fluid" height="50px" width="50px"></td> -->
                                                    <td>{{$customer->name ?? ''}}</td>
                                                    <td>{{$customer->phone ?? ''}}</td>
                                                    <td>{{$customer->email ?? ''}}</td>
                                                    <td>{{$customer->alternate_no ?? ''}}</td>
                                                    <td>{{$customer->address ?? ''}}</td>
                                                    <td>{{$customer->pincode ?? ''}}</td>
                                                    <td>
                                                        <table>
                                                            <tr> 
                                                                <td><a href="#" class="btn btn-success edit-customer" data-id="{{$customer->id}}" data-toggle="modal" data-target=".bd-example-modal-lg" ><i class="fa fa-edit"></i></a></td>
                                                                <td><a href="#"  data-toggle="modal" data-target="#exampleModal"  data-id="{{$customer->id}}"  class="btn btn-info accept" >Accept</a></td>
                                                                <!-- <td><a href="#" class="btn btn-outline-danger" data-id="{{$customer->id}}">Reject</a></td> -->
                                                            @if(Auth::user()->role_id==1)
                                                                <td><a href="{{route('customer.delete',$customer->id)}}" class="btn btn-danger" onclick="return confirm('Are You Sure')"><i class="fa fa-trash"></i></a></td>
                                                            @endif
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>SL</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Alternate No</th>
                                            <th>Address</th>
                                            <th>Pin Code</th>
                                            <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="UpdatcustomerModalLabel">Updat Customer</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form class="form-horizontal row content-justify-center" action="{{route('customer.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="customer-id" value="">
                            <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-2">Name</label>
                                <div class="col-sm-6">
                                    <input id="update-name" name="name" type="text" placeholder="Name " value="{{ old('name') }}" class="form-control  @error('name') is-invalid @enderror">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Email</label>
                                <div class="col-sm-6">
                                    <input id="update-email" name="email" type="email" placeholder="email " value="{{ old('email') }}" class="form-control  @error('email') is-invalid @enderror">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Phone</label>
                                <div class="col-sm-6">
                                    <input id="update-phone" name="phone" type="text" placeholder="phone " value="{{ old('phone') }}" class="form-control  @error('phone') is-invalid @enderror">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Alternate No</label>
                                <div class="col-sm-6">
                                    <input id="update-alternate_no" name="alternate_no" type="text" placeholder="Alternate no " value="{{ old('alternate_no') }}" class="form-control  @error('alternate_no') is-invalid @enderror">
                                    @error('alternate_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Address</label>
                                <div class="col-sm-6">
                                <textarea id="update-address" name="address" class="form-control  @error('address') is-invalid @enderror">{{ old('address') }}</textarea>
                                    <!-- <input id="update-address" name="address" type="text" placeholder="Address " value="{{ old('address') }}" class="form-control  @error('address') is-invalid @enderror"> -->
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Pin Code</label>
                                <div class="col-sm-6">
                                    <input id="update-pincode" name="pincode" type="text" placeholder="Pin Code " value="{{ old('pincode') }}" class="form-control  @error('pincode') is-invalid @enderror">
                                    @error('pincode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">City</label>
                                <div class="col-sm-6">
                                    <input id="update-city" name="city" type="text" placeholder="City " value="{{ old('city') }}" class="form-control  @error('city') is-invalid @enderror">
                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">State</label>
                                <div class="col-sm-6">
                                    <input id="update-state" name="state" type="text" placeholder="State " value="{{ old('state') }}" class="form-control  @error('state') is-invalid @enderror">
                                    @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Courier Name</label>
                                <div class="col-sm-6">
                                    <!-- <input id="update-courier_address" name="courier_address" type="text" placeholder="Courier Name " value="{{ old('courier_address') }}" class="form-control  @error('courier_address') is-invalid @enderror"> -->
                                    <textarea id="update-courier_address" name="courier_address" class="form-control  @error('courier_address') is-invalid @enderror">{{ old('courier_address') }}</textarea>
                                    @error('courier_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">       
                                <div class="col-sm-10 offset-sm-2">
                                <input type="submit" value="Update" class="btn btn-primary">
                                </div>
                            </div>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
             <hr>
         </div>
     </section>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Select Agent</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="modal-body">
        <form class="form-horizontal row content-justify-center" action="{{route('customer.accept')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" id="customer-id-agent" value="">
                        
            <div class="col-md-12">
            <div class="form-group row">
                <label class="col-sm-2">Agent</label>
                <div class="col-sm-6">
                <select name="agent_id"  class="form-control">
                <option value="">Select</option>
                @foreach($agents as $agent)
                <option value="{{$agent->id ?? ''}}">{{$agent->name ?? ''}}</option>
                @endforeach
                </select>
                </div>
            </div>
            <div class="form-group row">       
                <div class="col-sm-10 offset-sm-2">
                <input type="submit" value="Accept" class="btn btn-primary">
                </div>
            </div>
        </form>
      </div>
      </div>
      </div>
    </div>
  </div>
</div>
    <!-- Create Modal -->
        <div class="modal fade" id="createCustomerModal" tabindex="-1" role="dialog" aria-labelledby="createCustomerModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createCustomerModalLabel">Create Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form class="form-horizontal row content-justify-center" action="{{route('customer.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-sm-2">Name</label>
                        <div class="col-sm-6">
                            <input id="name" name="name" type="text" placeholder="Name " value="{{ old('name') }}" class="form-control  @error('name') is-invalid @enderror">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2">Email</label>
                        <div class="col-sm-6">
                            <input id="email" name="email" type="email" placeholder="email " value="{{ old('email') }}" class="form-control  @error('email') is-invalid @enderror">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2">Phone</label>
                        <div class="col-sm-6">
                            <input id="phone" name="phone" type="text" placeholder="phone " value="{{ old('phone') }}" class="form-control  @error('phone') is-invalid @enderror">
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2">Alternate No</label>
                        <div class="col-sm-6">
                            <input id="alternate_no" name="alternate_no" type="text" placeholder="Alternate no " value="{{ old('alternate_no') }}" class="form-control  @error('alternate_no') is-invalid @enderror">
                            @error('alternate_no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                        <div class="form-group row">
                            <label class="col-sm-2">Address</label>
                            <div class="col-sm-6">
                            <textarea id="address" name="address" class="form-control  @error('address') is-invalid @enderror">{{ old('address') }}</textarea>
                                <!-- <input id="address" name="address" type="text" placeholder="Address " value="{{ old('address') }}" class="form-control  @error('address') is-invalid @enderror"> -->
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                                <label class="col-sm-2">Pin Code</label>
                                <div class="col-sm-6">
                                    <input id="pincode" name="pincode" type="text" placeholder="Pin Code " value="{{ old('pincode') }}" class="form-control  @error('pincode') is-invalid @enderror">
                                    @error('pincode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">City</label>
                                <div class="col-sm-6">
                                    <input id="city" name="city" type="text" placeholder="City " value="{{ old('city') }}" class="form-control  @error('city') is-invalid @enderror">
                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">State</label>
                                <div class="col-sm-6">
                                    <input id="state" name="state" type="text" placeholder="State " value="{{ old('state') }}" class="form-control  @error('state') is-invalid @enderror">
                                    @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                    <div class="form-group row">
                        <label class="col-sm-2">Courier Name</label>
                        <div class="col-sm-6">
                        <textarea id="courier_address" name="courier_address" class="form-control  @error('courier_address') is-invalid @enderror">{{ old('courier_address') }}</textarea>
                              
                            <!-- <input id="courier_address" name="courier_address" type="text" placeholder="Courier Name " value="{{ old('courier_address') }}" class="form-control  @error('courier_address') is-invalid @enderror"> -->
                            @error('courier_address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group row">       
                        <div class="col-sm-10 offset-sm-2">
                        <input type="submit" value="Create" class="btn btn-primary">
                        </div>
                    </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script>
$(document).ready(function(){
   
    $(document).on('click','.edit-customer',function(e){
        e.preventDefault()
        var id=$(this).data('id');
        console.log(id)
        $.ajax({
                url: 'customer-edit/'+id,
                type: 'GET',
                data: { id: id },
                success:function(data)
                {
                    console.log(data)
                    $("#customer-id").val(data.id);
                    $("#update-name").val(data.name);
                    $("#update-phone").val(data.phone);
                    $("#update-email").val(data.email);
                    $("#update-address").val(data.address);
                    $("#update-alternate_no").val(data.alternate_no);
                    $("#update-pincode").val(data.pincode);
                    $("#update-state").val(data.state);
                    $("#update-city").val(data.city);
                    $("#update-courier_address").val(data.courier_address);
                }
    })
    })
    $(document).on('click','.accept',function(e){
        e.preventDefault()
        var id=$(this).data('id');
        $("#customer-id-agent").val(id);
        console.log(id)
    })
});
</script>
@endsection
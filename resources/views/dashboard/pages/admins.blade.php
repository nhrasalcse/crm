@extends('dashboard.layouts.master')
@section('content')
<!-- Breadcrumb-->
    <div class="breadcrumb-holder">
         <div class="container-fluid">
             <ul class="breadcrumb">
                 <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                 <li class="breadcrumb-item active">Admins</li>
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
                     <a  href="#" class="btn btn-primary offset-md-9" data-toggle="modal" data-target="#createAdminModal">Create Admin</a>
                     <!-- <a v-if="profiles" :to="{name:'about.update',params:{id:profiles.id}}" class="btn btn-success offset-md-9">Update</a> -->
                 </div>
             </div>
            <section v-else class="content">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                            <h4>Admin Table </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped myTable data-table">
                                        <thead>
                                            <tr>
                                            <th>SL</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(count( $admins)>0)
                                                @foreach($admins as $key=>$admin)
                                                <tr  style="opacity: {{$admin->status==1 ? '' : '.5'}} ;">
                                                    <th>{{$key+1}}</th>
                                                    <td><img src="{{asset($admin->image) ?? asset('/backend/img/avatar/avatarM.png')}}" alt="" class="img-fluid" height="50px" width="50px"></td>
                                                        <td>{{$admin->name ?? ''}}</td>
                                                    <td>{{$admin->phone ?? ''}}</td>
                                                    <td>{{$admin->email ?? ''}}</td>
                                                    <td>{{$admin->role->name ?? ''}}</td>
                                                    <td>@if($admin->status==1)<p class="text-light bg-success rounded text-center p-2">Active</p>@else<p class="text-light bg-danger rounded text-center p-2">Deactive</p>@endif</td>
                                                    <td>{{$admin->address ?? ''}}</td>
                                                    <td>
                                                        <table>
                                                            <tr>
                                                                
                                                            <td><a href="{{route('admin.status',$admin->id)}}" class="btn btn-info"><i class="fa {{$admin->status==1 ? 'fa-eye' : 'fa-eye-slash'}}"></i></a></td>
                                                            @if($admin->status==1)
                                                                <td><a href="#" class="btn btn-success edit-admin" data-id={{$admin->id}} data-toggle="modal" data-target=".bd-example-modal-lg" ><i class="fa fa-edit"></i></a></td>
                                                                <td><a href="{{route('admin.delete',$admin->id)}}" class="btn btn-danger" onclick="return confirm('Are You Sure')"><i class="fa fa-trash"></i></a></td>
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
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>Address</th>
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
                            <h5 class="modal-title" id="UpdatAdminModalLabel">Updat Admin</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form class="form-horizontal row content-justify-center" action="{{route('admin.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="admin-id" value="">
                            <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-2">Name</label>
                                <div class="col-sm-6">
                                    <input id="update-name" name="name" type="text" placeholder="Name " value="{{ old('name') }}" class="form-control  @error('password') is-invalid @enderror">
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
                                    <input id="update-email" name="email" type="email" placeholder="email " value="{{ old('email') }}" class="form-control  @error('password') is-invalid @enderror">
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
                                    <input id="update-phone" name="phone" type="text" placeholder="phone " value="{{ old('phone') }}" class="form-control  @error('password') is-invalid @enderror">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Address</label>
                                <div class="col-sm-6">
                                    <input id="update-address" name="address" type="text" placeholder="Address " value="{{ old('address') }}" class="form-control  @error('password') is-invalid @enderror">
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Password</label>
                                <div class="col-sm-6">
                                    <input id="update-password" name="password" type="password" placeholder="password " value="{{ old('password') }}" class="form-control  @error('password') is-invalid @enderror">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Role</label>
                                <div class="col-sm-6">
                                    <select name="role_id" id="update-role" class="form-control  @error('password') is-invalid @enderror">
                                        <option value="">Select</option>
                                        @foreach($roles as $role)
                                        <option value="{{$role->id ?? ''}}">{{$role->name ?? ''}}</option>
                                        @endforeach
                                    </select>
                                @error('role_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Image</label>
                                <div class="col-sm-6">
                                    <input id="update-image" name="image" type="file" placeholder="image " value="{{ old('image') }}" class="form-control  @error('image') is-invalid @enderror">
                                    @error('image')
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

    <!-- Create Modal -->
        <div class="modal fade" id="createAdminModal" tabindex="-1" role="dialog" aria-labelledby="createAdminModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createAdminModalLabel">Create Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form class="form-horizontal row content-justify-center" action="{{route('admin.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-sm-2">Name</label>
                        <div class="col-sm-6">
                            <input id="name" name="name" type="text" placeholder="Name " value="{{ old('name') }}" class="form-control  @error('password') is-invalid @enderror">
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
                            <input id="email" name="email" type="email" placeholder="email " value="{{ old('email') }}" class="form-control  @error('password') is-invalid @enderror">
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
                            <input id="phone" name="phone" type="text" placeholder="phone " value="{{ old('phone') }}" class="form-control  @error('password') is-invalid @enderror">
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2">Address</label>
                        <div class="col-sm-6">
                            <input id="address" name="address" type="text" placeholder="Address " value="{{ old('address') }}" class="form-control  @error('password') is-invalid @enderror">
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2">Password</label>
                        <div class="col-sm-6">
                            <input id="password" name="password" type="password" placeholder="password " value="{{ old('password') }}" class="form-control  @error('password') is-invalid @enderror">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2">Role</label>
                        <div class="col-sm-6">
                            <select name="role_id" id="" class="form-control  @error('password') is-invalid @enderror">
                                <option value="">Select</option>
                                @foreach($roles as $role)
                                <option value="{{$role->id ?? ''}}">{{$role->name ?? ''}}</option>
                                @endforeach
                            </select>
                        @error('role_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2">Image</label>
                        <div class="col-sm-6">
                            <input id="image" name="image" type="file" placeholder="image " value="{{ old('image') }}" class="form-control  @error('image') is-invalid @enderror">
                            @error('image')
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
   
    $(document).on('click','.edit-admin',function(e){
        e.preventDefault()
        var id=$(this).data('id');
        console.log(id)
        $.ajax({
                url: 'user-edit/'+id,
                type: 'GET',
                data: { id: id },
                success:function(data)
                {
                    $("#admin-id").val(data.id);
                    $("#update-name").val(data.name);
                    $("#update-phone").val(data.phone);
                    $("#update-email").val(data.email);
                    $("#update-address").val(data.address);
                    $('#update-role option').each(function() {
                    if($(this).val() == data.role_id) {
                        $(this).attr('selected', 'selected').prop('selected', true);
                    }
                });
                }
    })
    })
});
</script>
@endsection
@extends('dashboard.layouts.master')
 @section('content')

  <!-- Breadcrumb-->
  <div class="breadcrumb-holder">
         <div class="container-fluid">
             <ul class="breadcrumb">
                 <li class="breadcrumb-item"><a href="">Home</a></li>
                 <li class="breadcrumb-item active">profile      </li>
             </ul>
         </div>
     </div>
     <section class="statistics">
         <div class="container-fluid">
             <div class="row">
                 <div class="col-sm-12 col-md-6" >
                     <header><h1 class="h3 display">profile </h1> </header>
                 </div>
                 <div class="col-sm-12 col-md-6 mt-4">
                     <!-- <a v-if="!profiles"  :to="{name:'about.create'}" class="btn btn-primary offset-md-9">Create</a>
                     <a v-if="profiles" :to="{name:'about.update',params:{id:profiles.id}}" class="btn btn-success offset-md-9">Update</a> -->
                 </div>
             </div>
            <section v-else class="content">
                <div class="row">
                <div class="col-md-3">
                        <div class="card">
                            <div class="row content-justify-center">
                            <!-- {{$profile->image}} -->
                                    <!-- <img src="/backend/img/avatar-5.jpg" alt="..." class="img-fluid rounded-circle"> -->
                                    <img src="{{$profile->image ? asset($profile->image) : asset('backend/img/avatar-5.jpg')}}" alt="..." class="img-fluid rounded-circle">
                                <div class="msg-body mx-5 text-center mt-2">
                                    <h3 class="h5">{{$profile->name ? $profile->name : ''}}</h3>
                                    <span>{{$profile->email ? $profile->email : ''}}</span><br>
                                    <small>{{$profile->address ? $profile->address : ''}}</small>
                                </div>              
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Edit</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Password Update</a>
                                </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <td>{{$profile->name ? $profile->name : ''}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Phone</th>
                                            <td>{{$profile->phone ? $profile->phone : ''}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Email</th>
                                            <td>{{$profile->email ? $profile->email : ''}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Address</th>
                                            <td>{{$profile->address ? $profile->address : ''}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Role</th>
                                            <td>{{ $profile->role->name ?? ''}}</td>
                                        </tr>
                                    </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <form class="form-horizontal" method="post" action="{{route('update')}}" enctype="multipart/form-data">
                                    @csrf
                                        <div class="form-group row">
                                            <label class="col-sm-2"> Name</label>
                                            <div class="col-sm-6">
                                                <input type="text" value="{{$profile->name ?? ''}}" name="name" placeholder="First Name" class="form-control "  >
                                                <small class="form-text">Enter Name</small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2">Email</label>
                                            <div class="col-sm-6">
                                                <input type="text" value="{{$profile->email ?? ''}}" name="email" placeholder="Contact email" class="form-control "  >
                                                <small class="form-text">Enter  your contact email</small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2"> Phone</label>
                                            <div class="col-sm-6">
                                                <input type="text" value="{{$profile->phone ?? ''}}" name="phone" placeholder="Enter your phone number" class="form-control "  >
                                                <small class="form-text">Enter  your tag</small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2">Address </label>
                                            <div class="col-sm-6">
                                                <textarea name="address"  placeholder="Address  details" class="form-control ">{{$profile->address ?? ''}}</textarea>
                                                <small class="form-text">Enter  your address</small>
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2">Image</label>
                                            <div class="col-sm-6">
                                                <input name="image" value="{{$profile->image ?? ''}}" type="file" placeholder=" Image" class="form-control " >
                                                <small class="form-text">image</small>
                                        </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-10 offset-sm-2">
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                <form class="form-horizontal" method="post" action="{{route('password.update')}}" enctype="multipart/form-data">
                                    @csrf
                                        <div class="form-group row">
                                            <label class="col-sm-2">Old Password</label>
                                            <div class="col-sm-6">
                                                <input type="password" name="oldPassword" placeholder="Enter Old Password" class="form-control"  >
                                                <small class="form-text">Enter  old password</small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2">New Password</label>
                                            <div class="col-sm-6">
                                                <input type="password" name="password" placeholder="New password" class="form-control "  >
                                                <small class="form-text">Enter  your  new password</small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2"> Confirm Password</label>
                                            <div class="col-sm-6">
                                                <input type="password" name="password_confirmation" placeholder="Enter your confirmation Password" class="form-control password_confirmation ? 'is-invalid' : '' ]"  >
                                                <small class="form-text">Enter  Confirm password</small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-10 offset-sm-2">
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                            
                                </div>
                                </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
             <hr>
         </div>
     </section>
 @endsection
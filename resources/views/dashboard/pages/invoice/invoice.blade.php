@extends('dashboard.layouts.master')
@section('content')
<!-- Breadcrumb-->
    <div class="breadcrumb-holder">
         <div class="container-fluid">
             <ul class="breadcrumb">
                 <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                 <li class="breadcrumb-item active">Invoice</li>
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
                     <a  href="{{route('invoice.create')}}" class="btn btn-primary offset-md-9" >Create</a>
               </div>
             </div>
            <section v-else class="content">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                            <h4>Invoice Table </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped myTable data-table">
                                        <thead>
                                            <tr>
                                            <th>Order Date</th>
                                            <th>Order ID</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>City</th>
                                            <th>Total</th>
                                            @if(Auth::user()->role_id==1)
                                            <th>Agent</th>
                                            @endif
                                            <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(count( $invoices)>0)
                                                @foreach($invoices as $key=>$invoice)
                                                <tr>
                                                    <td>{{ date("d-M-Y", strtotime($invoice->date)) ?? ''}}</td>
                                                    <td>{{$invoice->id ?? ''}}</td>
                                                    <td>{{$invoice->customers->name ?? ''}}</td>
                                                    <td>{{$invoice->customers->phone ?? ''}}</td>
                                                    <td>{{$invoice->customers->city ?? ''}}</td>
                                                    <td>{{$invoice->total ?? ''}}</td>
                                                    @if(Auth::user()->role_id==1)
                                                    <td>{{$invoice->user->name ?? ''}}</td>
                                                    @endif
                                                    <td>
                                                        <table>
                                                            <tr> 
                                                               <td><a href="{{route('invoice.print',$invoice->id)}}" class="btn btn-info" target="_blank"><i class="fa fa-print"></i></a></td>
                                                          
                                                            @if(Auth::user()->role_id==1)
                                                                <td><a href="{{route('invoice.delete',$invoice->id)}}" class="btn btn-danger" onclick="return confirm('Are You Sure')"><i class="fa fa-trash"></i></a></td>
                                                                <td><a href="{{route('invoice.edit',$invoice->id)}}" class="btn btn-success" data-id="{{$invoice->id}}"><i class="fa fa-edit"></i></a></td>
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
                                            <th>Order Date</th>
                                            <th>Order ID</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>City</th>
                                            <th>Total</th>
                                            @if(Auth::user()->role_id==1)
                                            <th>Agent</th>
                                            @endif
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
             <hr>
         </div>
     </section>
@endsection
@section('js')
<script>
</script>
@endsection
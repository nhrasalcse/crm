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
                     <a  href="{{route('invoice.index')}}" class="btn btn-primary offset-md-9">Invoice</a>
                     <!-- <a v-if="profiles" :to="{name:'about.update',params:{id:profiles.id}}" class="btn btn-success offset-md-9">Update</a> -->
                 </div>
             </div>
            <section v-else class="content">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                            <h4>Invoice Update Form </h4>
                            </div>
                            <div class="card-body">
                <form class="content-justify-center" action="{{route('invoice.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$invoice->id}}">
                            <div class="form-group row">
                                <label class="col-sm-2">Customer</label>
                                <div class="col-sm-6">
                                    <select name="customer_id" id="" class="form-control  @error('customer_id') is-invalid @enderror">
                                        <option value="">Select</option>
                                        @foreach($customers as $customer)
                                        <option value="{{$customer->id ?? ''}}" {{$invoice->customer_id==$customer->id ? 'selected' : ''}}>{{$customer->name ?? ''}}</option>
                                        @endforeach
                                    </select>
                                @error('customer_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <table class="table table-borderless newbody" >
                                <thead>
                                <tr>
                                    <th scope="col">Product name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Sub Total</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($invoiceDetails)>0)
                                    @foreach($invoiceDetails as $invdata)
                                    <tr>
                                        <td>
                                        <input type="text" name="product_name[]" value="{{$invdata->product_name ?? ''}}"  class="form-control" required>
                                        </td>
                                        <td><input type="number" min="1" name="price[]" value="{{$invdata->product_price ?? ''}}" class="form-control price" required></td>
                                        <td><input type="number" name="quantity[]" value="{{$invdata->product_qty ?? ''}}" min="1" class="form-control qty" required></td>
                                        <td><input type="number" name="sub_total[]" value="{{$invdata->sub_total ?? ''}}" class="form-control subtotal" readonly></td>
                                        <td><a class="btn-danger btn delete text-light">X</a></td>
                                    </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                            <a class="btn btn-info add text-light">Add Items</a>
                            
                            <div class="row m-3">
                            <div class="col-md-6">
                            <table class="table table-borderless">
                            <tr>
                                <td>Total</td>
                                <td>
                                    <input type="text" name="subtotal" value="{{$invoice->sub_total ?? ''}}" class="form-control total"readonly></td>
                            </tr>
                            <!-- <tr>
                                <td>Discount</td>
                                <td>
                                <div class="input-group mb-2">
                                    <input type="number" name="discount" value="{{$invoice->discount ?? ''}}" min="0" max="100" class="form-control discount" >
                                    <div class="input-group-prepend">
                                    <div class="input-group-text">%</div>
                                    </div>
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Tax</td>
                                <td>
                                <div class="input-group mb-2">
                                    <input type="number" name="tax" value="{{$invoice->tax ?? ''}}" min="0" max="100" class="form-control tax" >
                                    <div class="input-group-prepend">
                                    <div class="input-group-text">%</div>
                                    </div>
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td>
                                
                                <input type="text" readonly name="full_total" value="{{$invoice->total ?? ''}}" max="" class="form-control fulltotals" >
                                </td>
                            </tr>
                            </tr>
                            <tr>
                                <td>Pay</td>
                                <td>
                                
                                <input type="text" required name="pay" value="{{$invoice->paid ?? ''}}" max="" class="form-control pay" >
                                </td>
                            </tr>
                            <tr>
                                <td>Due</td>
                                <td>
                                <input type="text" name="due" value="{{$invoice->due ?? ''}}" class="form-control due" readonly>
                                </td>
                            </tr> -->
                            </table>
                            </div>
                            </div>
                                <button class="btn btn-success text-light">Update</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </section></div>
     </section>
@endsection
@section('js')
 <script type='text/javascript'>
        $(document).ready(function(){
            // function totalAmount(){
            //     var t = 0;
            //     $('.subtotal').each(function(i,e){
            //         var amt = $(this).val()-0;
            //         t += amt;
            //     });
            //     $('.total').val(t);
            // }
            $(function () {
                var i =1;
                $('.add').click(function () {
                    i++;
                    var field=
                    ` <tr>
                        <td>
                            <input type="text" name="product_name[]" value=""  class="form-control" required>
                        </td>
                        <td><input type="number" min="1" name="price[]" value="" class="form-control price" required></td>
                        <td><input type="number" name="quantity[]" value="" min="1" class="form-control qty" required></td>
                        <td><input type="number" name="sub_total[]" value="" class="form-control subtotal" readonly></td>
                        <td><a class="btn-danger btn delete text-light">X</a></td>
                    </tr>
                    `
                    ;
                    $('.newbody').append(field);
                });
                $('.newbody').delegate('.qty , .price', 'keyup', function (){
                    var tr = $(this).parent().parent();
                    var price= tr.find('.price').val();
                    var qty = tr.find('.qty').val();
                    var subtotal = price*qty;
                    tr.find('.subtotal').val(subtotal);
                    var t = 0;
                    $('.subtotal').each(function(i,e){
                        var amt = $(this).val()-0;
                        t += amt;
                    });
                    $('.total').val(t); var tr = $(this).parent().parent();
                    var price= tr.find('.price').val();
                    var qty = tr.find('.qty').val();
                    var subtotal = price*qty;
                    tr.find('.subtotal').val(subtotal);
                    var t = 0;
                    $('.subtotal').each(function(i,e){
                        var amt = $(this).val()-0;
                        t += amt;
                    });
                    $('.total').val(t);
                    
                    // totalAmount();
                    
                   $('.discount').val(0);
                   $('.tax').val(0);
                   $('.pay').val(0);
                    $('.fulltotals').val(0);
                    $('.due').val(0);
                    // totalAmount();
                });
                $('.pay,.discount,.tax').keyup(function () {
                    var total=$('.total').val();
                    var dis=$('.discount').val();
                    var tax=$('.tax').val();
                    var paid=$('.pay').val();
                    var tdis=total*dis/100;
                    var ftotal=total-tdis;
                    var ftax=ftotal*tax/100;
                    var fulltotal=ftotal+ftax;
                    var due=fulltotal-paid;
                    $('.fulltotals').val(fulltotal);
                    $('.due').val(due);
                    $('.pay').attr('max',total);
                })

            });
            $('.newbody').delegate('.delete', 'click', function () {
                $(this).parent().parent().remove();
                totalAmount();
            });
        });
    </script>
    <script type='text/javascript'>
        $("#received").keyup(function(){
            var total=$("#total").val();
            var received=$("#received").val();
            var due=total - received ;
            $("#due").val(due);

        });
    </script>
@endsection
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>EARLY REDUCE | Invoice</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('backend')}}/vendor/bootstrap/css/bootstrap.min.css">
  
  <link rel="stylesheet" href="{{asset('backend')}}/vendor/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{asset('backend')}}/css/AdminLTE.min.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <link rel="shortcut icon" href="{{asset('backend')}}/icon.PNG">

</head>

<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <img src="{{asset('backend')}}/icon.PNG" class="img-fluid" height="50px" width="50px" alt=""> EARLY REDUCE.
          <!-- <small class="pull-right">Date: 2/10/2014</small> -->
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        From
        <address>
          <strong>EARLY REDUCE..</strong><br>
         Company Address<br>
          Phone: XXXXXXXXXXXXX<br>
          Email: XXXXXXXXXXXXX<br>
          Invoice Date: {{ date("d-M-Y")}}
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        To
        <address>
          <strong>{{$invoice->customers->name ?? ''}}</strong><br>
          {{$invoice->customers->address ?? ''}}<br>
          Pin Code: {{$invoice->customers->pincode ?? ''}}<br>
          Phone: {{$invoice->customers->phone ?? ''}}<br>
          Email: {{$invoice->customers->email ?? ''}}
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <b>Invoice #00{{$invoice->id ?? ''}}</b><br>
        <br>
        <b>Courier Address:</b> {{$invoice->customers->courier_address ?? ''}}<br>
        <b>Order Date:</b> {{ date("d-M-Y", strtotime($invoice->date)) ?? ''}}<br>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <div class="row justify-content-center m-3">
    <div class="col-md-4">
    <b>
    TOTAL AMOUNT<br>Rs. {{$invoice->total ?? ''}}
    </b>

    </div>
    </div>

    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>SL</th>
            <th>Product</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Subtotal</th>
          </tr>
          </thead>
          <tbody>
          @foreach($invoiceDetails as $key=>$indata)
          <tr>
            <td>{{$key+1}}</td>
            <td>{{$indata->product_name}}</td>
            <td>{{$indata->product_price}}</td>
            <td>{{$indata->product_qty}}</td>
            <td>{{$indata->sub_total}}</td>
          </tr>
          @endforeach
          </tbody>
          <tfoot>
          <tr>
            <th colspan="4" class="text-uppercase"> total (inclusive of all taxes and shipping charges)</th>
            <th>Rs. {{$invoice->total ?? ''}}</th>
            
          </tr>
          </tr></tfoot>
        </table>
      </div>
      <!-- /.col -->
    </div>
    
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <!-- <div class="col-xs-6">
        <p class="lead">Payment Methods:</p>
        <img src="../../dist/img/credit/visa.png" alt="Visa">
        <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
        <img src="../../dist/img/credit/american-express.png" alt="American Express">
        <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
          Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr
          jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
        </p>
      </div> -->
      <!-- /.col -->
     
     
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>


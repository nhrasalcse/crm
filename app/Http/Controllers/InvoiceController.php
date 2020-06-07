<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use App\InvoiceDetail;
use App\Customer;

use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
class InvoiceController extends Controller
{
  public function index(){
     
        if(Auth::user()->role_id==1){
          $invoices=Invoice::with([
            'customers'=>function($query){ $query->select(['id','name','phone','city']);},
            'user'=>function($query){ $query->select(['id','name']);}
          ])->where('delete_status',1)->get();
        }else{
          $invoices=Invoice::with([
            'customers'=>function($query){ $query->select(['id','name','phone','city']);},
            'user'=>function($query){ $query->select(['id','name']);}
          ])->where('user_id',Auth::user()->id)->where('delete_status',1)->get();
        }

        return view('dashboard.pages.invoice.invoice',compact('invoices')); 
  }
    public function create_invoice(){
        // $customers=Customer::where('delete_status',1)->get();
        if(Auth::user()->role_id==1){
          $customers=Customer::with('agent')->where('delete_status',1)->where('pendding_status',1)->get();
        }else{
          $customers=Customer::where('delete_status',1)->where('pendding_status',1)->where('agent_id',Auth::user()->id)->get();
        }
        return view('dashboard.pages.invoice.create-invoice',compact('customers'));
      }
      public function store(Request $request){
        // return $request;
        $this->validate($request,[
              'customer_id'=>'required',
          ]);
        $invoice=new Invoice();
        $invoice->customer_id=$request->customer_id;
        $invoice->sub_total=$request->subtotal;
        // $invoice->tax=$request->tax;
        // $invoice->discount=$request->discount;
        $invoice->total=$request->subtotal;
        // $invoice->paid=$request->pay;
        // $invoice->due=$request->due;
        // $invoice->date=$request->date;
        $invoice->user_id=Auth::user()->id;
        $invoice->date=date('Y-m-d');
        if($invoice->save()){
          foreach($request->product_name as $key=>$pdata){
                  $invoiceDetails=new InvoiceDetail();
                  $invoiceDetails->invoice_id=$invoice->id;
                  $invoiceDetails->product_name=$request->product_name[$key];
                  $invoiceDetails->product_price=$request->price[$key];
                  $invoiceDetails->product_qty=$request->quantity[$key];
                  $invoiceDetails->sub_total=$request->sub_total[$key];
                  $invoiceDetails->date=date('Y-m-d');
                  $invoiceDetails->user_id=Auth::user()->id;
                  $invoiceDetails->save();
                  }
            Toastr::success('Create Invoice successful','Success');
            return back();
            }

        
      }
      public function edit($id){
         $invoice=Invoice::findOrFail($id);
         $invoiceDetails=InvoiceDetail::where('invoice_id',$id)->get();
         $customers=Customer::where('delete_status',1)->get();
        return view('dashboard.pages.invoice.edit-invoice',compact('invoice','invoiceDetails','customers'));

      }
      public function update(Request $request){
        Toastr::Info('Development is on processing please wait sometimes','Sorry');
        return back();
        $this->validate($request,[
            'name'=>'required',
            'phone'=>'required',
            'address'=>'required|min:6',
            'email'=>'required',
            'alternate_no'=>'required',
            'courier_address'=>'required',
        ]);
        $invoice=Invoice::findOrFail($request->id);
        $invoice->name=$request->name;
        $invoice->phone=$request->phone;
        $invoice->email=$request->email;
        $invoice->address=$request->address;
        $invoice->pincode=$request->pincode;
        $invoice->city=$request->city;
        $invoice->state=$request->state;
        $invoice->alternate_no=$request->alternate_no;
        $invoice->courier_address=$request->courier_address;
        $invoice->date=date('Y-m-d');
        $invoice->save();
        Toastr::success('Update Invoice successful','Success');
        return back();
      }
      public function SoftDelete($id){
        $invoice=Invoice::findOrFail($id);
          if ($invoice->delete_status==1){
            $invoice->delete_status=0;
          }else{
            $invoice->delete_status=1;
          }
        $invoice->save();
        Toastr::success('Delete Invoice successful','Success');
      return back();
      }
      public function printinvoice($id){
         $invoice=Invoice::with([
          'customers',
        ])->findOrFail($id);
        $invoiceDetails=InvoiceDetail::where('invoice_id',$id)->get();
        return view('dashboard.pages.invoice.invoice-print',compact('invoice','invoiceDetails'));

      }
}

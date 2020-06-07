<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    protected $fillable=[

       'invoice_id',
       'product_name',
       'product_price',
       'product_qty',
       'sub_total',
       'date',
       'user_id',
       ];
       public function user(){
        return $this->belongsTo(User::class ,'user_id');
       }
       public function invoices(){
        return $this->belongsTo(Invoices::class ,'invoice_id');
       }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
   protected $fillable=[

    'customer_id',
    'sub_total',
    'tax',
    'discount',
    'total',
    'paid',
    'due',
    'date',
    'payment_method',
    'user_id',
    'order_status',
   ];
   public function user(){
    return $this->belongsTo(User::class ,'user_id');
   }
   public function customers(){
    return $this->belongsTo(Customer::class ,'customer_id');
   }
}

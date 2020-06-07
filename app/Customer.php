<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  protected $fillable=[
    'name',
    'phone',
    'email',
    'address',
    'pincode',
    'city',
    'state',
    'courier_address',
    'alternate_no',
    'date',
    'pendding_status',
    'agent_id',
  ];
}

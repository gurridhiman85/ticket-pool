<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderCostsetup extends Model
{
    use HasFactory; 
     
    public $timestamps = false;
 
    public $table ="order_costsetup";
    
    // public function orderCostdata()
    // {
    //     return $this->belongsTo(Customers::class,'customers_id','id');
    // } 

}

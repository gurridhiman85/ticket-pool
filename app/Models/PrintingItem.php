<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrintingItem extends Model
{
    use HasFactory; 
      
    public $timestamps = false;
  
    public $table ="PrintingItem";
    
}

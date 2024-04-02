<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Traits\HasPermissions;

class Customers extends Model
{
    use HasFactory; 

    use HasRoles, HasPermissions;
     
    public $timestamps = false;
    
    protected $fillable = [
        'name',
        'f_name',
        'l_name',
        'position',
        'primary_email', 
        'billing_email',
        'work_phone',
        'mobile_phone',
        'homephone',
        'business_customer',
        'deposit_required',
        'deposit_percentage',
        'payment_term',
        'credit_limit',
        'fixed_discount',
        'billing_address_line1',
        'billing_address_line2',
        'billing_suburb',
        'billing_state',
        'billing_postcode',
        'billing_country',
        'delivery_address_line1',
        'delivery_address_line2',
        'delivery_suburb',
        'delivery_state',
        'delivery_postcode',
        'delivery_country',
        'account_no',
        'total',
        'order_status',
        'date_added',
        

        // ... other fields ...
    ];
}

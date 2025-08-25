<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'ship_name','ship_phone','ship_address1','ship_address2','ship_city','ship_state','ship_postcode','ship_country',
        'billing_same_as_shipping','bill_name','bill_phone','bill_address1','bill_address2','bill_city','bill_state','bill_postcode','bill_country',
        'subtotal','shipping_fee','discount','total',
        'payment_method','payment_status','status',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}


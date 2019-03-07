<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $fillable=[
      'user_id',
      'ip_address',
      'payment_id',
      'name',
      'shipping_address',
      'phone_no',
      'email',
      'message',
      'is_paid',
      'is_completed',
      'transaction_id',
      'is_seen_by_admin'

    ];
    public function user()
    {
      return $this->belongsTo(User::class);
    }
    public function carts()
    {
      return $this->hasMany(Cart::class);
    }

    public function payment()
    {
      return $this->belongsTo(Payment::class);
    }
}

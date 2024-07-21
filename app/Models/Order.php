<?php

namespace App\Models;

use App\Events\OrderPlaced;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'amount',
        'invoice_count',
        'status'
    ];

    protected $dispatchesEvents = [
        'created' => OrderPlaced::class
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }


}

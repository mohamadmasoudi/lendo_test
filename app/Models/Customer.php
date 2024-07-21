<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'bank_account_number',
        'status',
        'complete_info',
        'mobile',
        'name'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
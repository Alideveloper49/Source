<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'invoices',
        'author',
        'party_id',
        'amount',
        'type',
        'status'
    ];

    public function users()
    {
    return $this->belongsTo(User::class,'author');
    }
    public function customer_party()
    {
    return $this->belongsTo(Customer::class,'party_id');
    }
}

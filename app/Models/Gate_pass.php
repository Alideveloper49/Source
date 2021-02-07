<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gate_pass extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'party_id',
        'invoice_id',
        'author',
        'product',
        'desc',
        'qty',
        'rate',
        'amount',
        'type',
        'node'
    ];
}

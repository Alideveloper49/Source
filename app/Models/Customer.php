<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'name',
        'company_name',
        'phone',
        'address',
        'author'
    ];

    public function users()
    {
    return $this->belongsTo(User::class,'author');
    }
}

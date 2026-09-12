<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    protected $table = 'fees';
    protected $primaryKey = 'fee_id';
    protected $fillable = [
        'memberName',
        'month',
        'amount',
        'method',
        'status' => 'paid'
    ];
}

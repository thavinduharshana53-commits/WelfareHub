<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $primaryKey='memberId';
    protected $table='member_add';
    protected $fillable= [
        'name',
        'nic_number',
        'tel_number',
        'address',
        'status'
    ];
}

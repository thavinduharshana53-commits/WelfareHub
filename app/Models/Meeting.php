<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $primaryKey = 'meeting_id';
    protected $table = 'meetings';
    protected $fillable = [
        'title',
        'date',
        'time',
        'venue',
        'text'
    ];
}

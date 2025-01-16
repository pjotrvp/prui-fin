<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'symbol', 'category', 'amount', 'initial_value', 'start_date',
    ];
}

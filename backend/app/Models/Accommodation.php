<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Accommodation extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $fillable =  [
        'original_id',
        'title',
        'advertiser',
        'description',
        'phones',
        'type',
        'price',
        'meter_price',
        'meters',
        'built_in',
        'register_at',
        'useful_meters',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sparePart extends Model
{
    protected $table='spare_parts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sparePrtName',
        'brand',
        'model',
        'year',
        'price',
        'vehicleVid',
        'shpId',
        'isDeleted',
    ];

}

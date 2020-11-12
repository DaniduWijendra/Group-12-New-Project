<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class report extends Model
{
    protected $table='reports';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $fillable = [
        
       'rDescription',
       'rCost',
       'rdate',
        'place',
        'vehicleNumber',
        'adminId',
        'agId',
        'isAccepted',
        'isDeleted'
    ];
}

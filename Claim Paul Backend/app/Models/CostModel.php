<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostModel extends Model
{
    use HasFactory;
    protected $table='costmodels';
    protected $fillable = [
        'damageType',
        'category',
        'cost',
    ];
}

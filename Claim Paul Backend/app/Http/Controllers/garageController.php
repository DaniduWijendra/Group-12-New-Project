<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class garageController extends Controller
{
    public function getGarages()
    {
        return DB::table('garages')
    
        ->select('garages.*')->where('isDeleted','0')->get();
    }
}

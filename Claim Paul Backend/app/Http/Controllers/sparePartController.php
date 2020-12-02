<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class sparePartController extends Controller
{
    public function getSparePart()
    {
        return DB::table('spare_parts')
    
        ->select('spare_parts.*')->where('isDeleted','0')->get();
    }

}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class shopController extends Controller
{
    public function getShops()
    {
        return DB::table('shops')
    
        ->select('shops.*')->where('isDeleted','0')->get();
    }
}

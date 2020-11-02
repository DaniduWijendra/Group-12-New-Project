<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class viewController extends Controller
{
    public function driverHistoryShow()
    {
        //echo "<h1>Hll</h1>";
        return DB::table('policy_holders')
         ->join('vehicles','vehicles.policyPid','policy_holders.pId')
         ->select('policy_holders.NIC','policy_holders.fName','policy_holders.lName',
         'policy_holders.pAddress','')->get();
    }
}

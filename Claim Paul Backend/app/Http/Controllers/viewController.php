<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class viewController extends Controller
{
    public function driverHistoryShow()
    {
        
        return DB::table('policy_holders')
         ->join('vehicles','vehicles.policyPid','policy_holders.pId')
         ->join('reports','reports.vehicleNumber','vehicles.vehicleNumber')
         ->select('policy_holders.pId','policy_holders.NIC','policy_holders.fName','policy_holders.lName',
         'policy_holders.pAddress','policy_holders.pDOB','policy_holders.pContactNo',
         'vehicles.vehicleNumber','reports.rId','reports.rDescription','reports.rCost','reports.rDate',
         'reports.place','reports.adminId','reports.agId','reports.isAccepted')->get();
    }
}

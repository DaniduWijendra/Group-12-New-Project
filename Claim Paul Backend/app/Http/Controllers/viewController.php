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
         'reports.place','reports.adminId','reports.agId','reports.isAccepted')->where('policy_holders.isDeleted','=','0')->get();
    }

    public function policyHolderShow()
    {
        return DB::table('policy_holders')->join(
            'vehicles','vehicles.policyPid','policy_holders.pId')
            ->select('policy_holders.pId','policy_holders.NIC','policy_holders.fName','policy_holders.lName',
            'policy_holders.pAddress','policy_holders.pDOB','policy_holders.pContactNo','policy_holders.isDeleted',
            'vehicles.vehicleNumber')->where('policy_holders.isDeleted','=','0')->get();
    }
    public function agentsShow()
    {
        return DB::table('agents')->select('agents.agId','agents.fName','agents.lName','agents.agAddress','agents.agDob',
        'agents.agContactNo','agents.email','agents.agBranch')->where('agents.isDeleted','=','0')->get();
    }

    public function getHistory($email)
    {
        return DB::table('policy_holders')
         ->join('vehicles','vehicles.policyPid','policy_holders.pId')
         ->join('reports','reports.vehicleNumber','vehicles.vehicleNumber')
         ->select('policy_holders.pId','policy_holders.NIC','policy_holders.fName','policy_holders.lName','policy_holders.policyholder_email',
         'policy_holders.pAddress','policy_holders.pDOB','policy_holders.pContactNo',
         'vehicles.vehicleNumber','reports.rId','reports.rDescription','reports.rCost','reports.rDate',
         'reports.place','reports.adminId','reports.agId','reports.isAccepted')->where('policy_holders.isDeleted','=','0')->where('policy_holders.policyholder_email','=',$email)->get();
    }
}

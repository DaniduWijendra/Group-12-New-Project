<?php

namespace App\Http\Controllers;
use App\Models\report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class reportController extends Controller
{
    public function getReport()
    {
        return DB::table('reports')
    
         ->select('reports.*')->where('isDeleted','0')->get();

    }

    public function putReport(Request $rs)
    {
        DB::table('reports')->insert(
            [
                 'rDescription' => $rs->rDescription,
                 'rCost' => $rs->rCost,
                 'rDate' => $rs->rDate,
                 'place' => $rs->place,
                 'vehicleNumber' => $rs->vehicleNumber,
                 'adminId' => $rs->adminId,
                 'agId' => $rs->agId,
                 'isAccepted' => 0,
                 'isDeleted' => 0,
            ]
        );
    }

    public function getOneReport($id)
    {
        $item=DB::table('reports')->where('rId', $id)->exists();

        if(!$item)
        {
            return response()->json(['msg'=>'this record is not found'],404);
        }

        else{

            $report = DB::table('reports')->where('rId', '=', $id)->get();

            return response()->json(['report'=>$report],200);

        }
       
    }

    public function editReport(Request $rs,$id)
    {
        $isAccepted='';

        $item=DB::table('reports')->where('rId', $id)->exists();

        if(!$item)
        {
            return response()->json(['msg'=>'this record is not found'],404);
        }

        else{

           

            if($rs->isAccepted=='Accepted')
            {
                $isAccepted=1;
            }
            else{
                $isAccepted=0;
            }


            DB::table('reports')
            ->where('rId', $id)
            ->update( [
                'rDescription' => $rs->rDescription,
                'rCost' => $rs->rCost,
                'rDate' => $rs->rDate,
                'place' => $rs->place,
                'vehicleNumber' => $rs->vehicleNumber,
                'adminId' => $rs->adminId,
                'agId' => $rs->agId,
                'isAccepted' => $isAccepted,
                'isDeleted' => 0,
           ]);

          

        }

    }

    public function deleteReport(Request $rs,$id)
    {
        $item=DB::table('reports')->where('rId', $id)->exists();

        if(!$item)
        {
            return response()->json(['msg'=>'this record is not found'],404);
        }

        else{

            DB::table('reports')
            ->where('rId', $id)
            ->update( [
                'rDescription' => $rs->rDescription,
                'rCost' => $rs->rCost,
                'rDate' => $rs->rDate,
                'place' => $rs->place,
                'vehicleNumber' => $rs->vehicleNumber,
                'adminId' => $rs->adminId,
                'agId' => $rs->agId,
                'isAccepted' => 0,
                'isDeleted' => 1,
           ]);

          

        }


    }

}

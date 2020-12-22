<?php

namespace App\Http\Controllers;
use App\Models\report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class reportController extends Controller
{   public function getReportDetails($id) 
    {
        $item=DB::table('reports')->where('rId', $id)->exists();
        if(!$item)
        {
            return response()->json(['msg'=>'this record is not found'],404);
        }
        else
        {
            $record=DB::table('reports')
            ->join('vehicles','vehicles.vehicleNumber','reports.vehicleNumber')
            ->join('policy_holders','policy_holders.pId','vehicles.policyPid')
            ->select(
                'vehicles.vehicleNumber','policy_holders.*','reports.*')->where('reports.rId','=',$id)->get();
                return response()->json(['report'=>$record],200);
        }
    }
    public function savePdf(Request $request,$id)
    {
        $expl=explode(',',$request->get('pdf'));//devide to two parts should get using get when add as params
        $decode=base64_decode($expl[1]);
        $ext='pdf';
        $current=Carbon::now()->timestamp;
        $fileName=$current.'.'.$ext;
        $filePath=public_path().'/pdf/'.$fileName;

        file_put_contents($filePath,$decode);
        DB::table('reports')
            ->where('rId', $id)
            ->update( [
                'pdf'=>$fileName
           ]);

        // $destinationPath = 'users/pdf';
        // $fileuploadedpath = '';
        // $pdf = $request->get('pdf_file');
        // if ($pdf != '') {
        //     $extension = $pdf->getClientOriginalExtension();
        //     $fileName = rand(11111, 99999) . '.' . $extension;
        //     $success[0] = $pdf->move($destinationPath, $fileName);
        //     $fileuploadedpath = url($destinationPath . "/" . $fileName);
        // }
    
        // dd($fileuploadedpath);
    }
    public function getReport()
    {
        return DB::table('reports')
    
         ->select('reports.*')->where('isDeleted','0')->get();

    }
    public function getAgentMail($id)
    {
        $item=DB::table('reports')->where('rId', $id)->exists();
        if(!$item)
        {
            return response()->json(['msg'=>'this record is not found'],404);
        }

        else{

            $record= DB::table('agents')
         ->join('reports','reports.agId','agents.agId')
         ->select('agents.email')->where('reports.rId','=',$id)->get();

            return response()->json(['agent'=>$record],200);

        }
    }

    public function filterReportById($filterItem)
    {
        return DB::table('reports')->select('reports.*')->where('rId',$filterItem)->get();

    }

    public function filterReportByDescription($filterItem)
    {
        return DB::table('reports')->select('reports.*')->where('rDescription',$filterItem)->get();

    }

    public function filterReportByDate($filterItem)
    {
        return DB::table('reports')->select('reports.*')->where('rDate',$filterItem)->get();

    }

    public function filterReportByVehicleNumber($filterItem)
    {
        return DB::table('reports')->select('reports.*')->where('vehicleNumber',$filterItem)->get();

    }

    public function filterReportByAdmin($filterItem)
    {
        return DB::table('reports')->select('reports.*')->where('adminId',$filterItem)->get();

    }

    public function filterReportByAgent($filterItem)
    {
        return DB::table('reports')->select('reports.*')->where('agId',$filterItem)->get();

    }

    public function filterReportByPlace($filterItem)
    {
        return DB::table('reports')->select('reports.*')->where('place',$filterItem)->get();

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

            // $report = DB::table('reports')
            //                 ->where('rId', '=', $id)->get();

            // return response()->json(['report'=>$report],200);

            $record=DB::table('reports')
            ->join('vehicles','vehicles.vehicleNumber','reports.vehicleNumber')
            ->join('policy_holders','policy_holders.pId','vehicles.policyPid')
            ->select(
                'vehicles.vehicleNumber','policy_holders.*','reports.*')->where('reports.rId','=',$id)->get();
                return response()->json(['report'=>$record],200);

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

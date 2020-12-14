<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class vehicleController extends Controller
{
    
    public function getVehicle()
    {
        return DB::table('vehicles')
    
         ->select('vehicles.*')->where('isDeleted', 0)->get();
    }
    public function getCost($damageType,$category)
    {
        return DB::table('costmodels')->select('cost')-> where('damageType',$damageType)->where('category',$category)->get();
    }
    // public function getCost($damageType,$category)
    // {
    //     return DB::table('costmodels')->select('cost')->
    //     where(['damageType',$damageType],['category',$category])->get();
    // }
    public function getOneImage($id)
    {
        $item=DB::table('vehicles')->where('vId', $id)->exists();

        if(!$item)
        {
            return response()->json(['msg'=>'this record is not found'],404);
        }

        else{

            $vehicle = DB::table('vehicles')->where('vId', '=', $id)->get();

            return response()->json(['vehicle'=>$vehicle],200);

        }
       
    }

    public function addVehicle(Request $rs)
    {
        $expl=explode(',',$rs->image);//devide to two parts
        $decode=base64_decode($expl[1]);

       if(str_contains($expl[0],'png'))
        {
            $ext='png';
        }
        else{
            $ext='jpg';
        }

        $current=Carbon::now()->timestamp;
        $fileName=$current.'.'.$ext;
        $filePath=public_path().'/images/'.$fileName;

        file_put_contents($filePath,$decode);

        DB::table('vehicles')->insert(
            [
            'vehicleNumber'=>$rs->vehicleNumber,
            'policyId'=>$rs->policyId,
            'type'=>$rs->type,
            'model'=>$rs->model,
            'color'=>$rs->color,
            'year'=>$rs->year,
            'insuranceDate'=>$rs->insuranceDate,
            'valuation'=>$rs->valuation,
            'insuranceType'=>$rs->insuranceType,
            'policyPid'=>$rs->policyPid,
            'garageGid'=>$rs->garageGid,
            'image' => $fileName,
            'isDeleted' => 0,]
        );
    }

    public function editVehicle(Request $rs,$id)
    {
        

        $item=DB::table('vehicles')->where('vId', $id)->exists();

        if(!$item)
        {
            return response()->json(['msg'=>'this record is not found'],404);
        }

        else{

            // $expl=explode(',',$rs->image);
            // $decode=base64_decode($expl[1]);

            // if(str_contains($expl[0],'png'))
            // {
            //     $ext='png';
            // }
            // else{
            //     $ext='jpg';
            // }

            // $current=Carbon::now()->timestamp;
            // $fileName=$current.'.'.$ext;
            // $filePath=public_path().'/images/'.$fileName;

            // file_put_contents($filePath,$decode);

        
            DB::table('vehicles')
            ->where('vId', $id)
            ->update( [
                'vehicleNumber'=>$rs->vehicleNumber,
                'policyId'=>$rs->policyId,
                'type'=>$rs->type,
                'model'=>$rs->model,
                'color'=>$rs->color,
                'year'=>$rs->year,
                'insuranceDate'=>$rs->insuranceDate,
                'valuation'=>$rs->valuation,
                'insuranceType'=>$rs->insuranceType,
                'policyPid'=>$rs->policyPid,
                'garageGid'=>$rs->garageGid,
                'isDeleted' => 0,
           ]);

          

        }

    }

    public function deleteVehicle(Request $rs,$id)
    {
        $item=DB::table('vehicles')->where('vId', $id)->exists();

        if(!$item)
        {
            return response()->json(['msg'=>'this record is not found'],404);
        }

        else{

            // $expl=explode(',',$rs->image);
            // $decode=base64_decode($expl[1]);

            // if(str_contains($expl[0],'png'))
            // {
            //     $ext='png';
            // }
            // else{
            //     $ext='jpg';
            // }

            // $current=Carbon::now()->timestamp;
            // $fileName=$current.'.'.$ext;
            //$filePath=public_path().'/images/'.$fileName;

            //file_put_contents($filePath,$decode);


            DB::table('vehicles')
            ->where('vId', $id)
            ->update( [
                'vehicleNumber'=>$rs->vehicleNumber,
                'policyId'=>$rs->policyId,
                'type'=>$rs->type,
                'model'=>$rs->model,
                'color'=>$rs->color,
                'year'=>$rs->year,
                'insuranceDate'=>$rs->insuranceDate,
                'valuation'=>$rs->valuation,
                'insuranceType'=>$rs->insuranceType,
                'policyPid'=>$rs->policyPid,
                'garageGid'=>$rs->garageGid,
                'isDeleted' => 1,
           ]);

          

        }


    }
}

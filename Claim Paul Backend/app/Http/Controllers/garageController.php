<?php
namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class garageController extends Controller
{
    public function getGarages()
    {
        return DB::table('garages')
    
        ->select('garages.*')->where('isDeleted','0')->get();
    }
    public function getOneImage($id)
    {
        $item=DB::table('garages')->where('gId', $id)->exists();

        if(!$item)
        {
            return response()->json(['msg'=>'this record is not found'],404);
        }

        else{

            $garage = DB::table('garages')->where('gId', '=', $id)->get();

            return response()->json(['garage'=>$garage],200);

        }
       
    }
    public function editGarage(Request $rs,$id)
    {
        

        $item=DB::table('garages')->where('gId', $id)->exists();

        if(!$item)
        {
            return response()->json(['msg'=>'this record is not found'],404);
        }

        else{
            DB::table('garages')
            ->where('gId', $id)
            ->update( [
                'gName'=>$rs->gName,
                'gAddress'=>$rs->gAddress,
                'gContactNo'=>$rs->gContactNo,
                'gLocation'=>$rs->gLocation,
                'isDeleted' => 0,
           ]);

          

        }

    }
    public function deleteGarage(Request $rs,$id)
    {
        $item=DB::table('garages')->where('gId', $id)->exists();

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


            DB::table('garages')
            ->where('gId', $id)
            ->update( [
                'gName'=>$rs->gName,
                'gAddress'=>$rs->gAddress,
                'gContactNo'=>$rs->gContactNo,
                'gLocation'=>$rs->gLocation,
                'isDeleted' => 1,
           ]);

          

        }


    }
    public function addGarage(Request $rs)
    {
        $expl=explode(',',$rs->image);
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

        DB::table('garages')->insert(
            [
                'gName'=>$rs->gName,
                'gAddress'=>$rs->gAddress,
                'gContactNo'=>$rs->gContactNo,
                'gLocation'=>$rs->gAddress,
                'image'=>$fileName,
                'isDeleted' =>0,]
        );
        
    }
}

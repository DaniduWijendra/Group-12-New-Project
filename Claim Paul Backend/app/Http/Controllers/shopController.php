<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class shopController extends Controller
{
    public function getShops()
    {
        return DB::table('shops')
    
         ->select('shops.*')->where('isDeleted', 0)->get();
    }
    public function getOneImage($id)
    {
        $item=DB::table('shops')->where('shpId', $id)->exists();

        if(!$item)
        {
            return response()->json(['msg'=>'this record is not found'],404);
        }

        else{

            $shop = DB::table('shops')->where('shpId', '=', $id)->get();

            return response()->json(['shop'=>$shop],200);

        }
       
    }
    public function editShop(Request $rs,$id)
    {
        

        $item=DB::table('shops')->where('shpId', $id)->exists();

        if(!$item)
        {
            return response()->json(['msg'=>'this record is not found'],404);
        }

        else{
            DB::table('shops')
            ->where('shpId', $id)
            ->update( [
                'sName'=>$rs->sName,
                'sAddress'=>$rs->sAddress,
                'sContact'=>$rs->sContact,
                'sLocation'=>$rs->sLocation,
                'isDeleted' => 0,
           ]);

          

        }

    }
    public function deleteShop(Request $rs,$id)
    {
        $item=DB::table('shops')->where('shpId', $id)->exists();

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


            DB::table('shops')
            ->where('shpId', $id)
            ->update( [
                'sName'=>$rs->sName,
                'sAddress'=>$rs->sAddress,
                'sContact'=>$rs->sContact,
                'sLocation'=>$rs->sLocation,
                'isDeleted' => 1,
           ]);

          

        }


    }
    public function addShop(Request $rs)
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

        DB::table('shops')->insert(
            [
                'sName'=>$rs->sName,
                'sAddress'=>$rs->sAddress,
                'sContact'=>$rs->sContact,
                'sLocation'=>$rs->sLocation,
                'image'=>$fileName,
                'isDeleted' =>0,]
        );
        
    }
}

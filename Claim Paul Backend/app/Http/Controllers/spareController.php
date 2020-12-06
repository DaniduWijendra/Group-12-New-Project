<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class spareController extends Controller
{
    public function getSpare()
    {
        return DB::table('spare_parts')
    
         ->select('spare_parts.*')->where('isDeleted', 0)->get();
    }
    public function getOneImage($id)
    {
        $item=DB::table('spare_parts')->where('sparePrtId', $id)->exists();

        if(!$item)
        {
            return response()->json(['msg'=>'this record is not found'],404);
        }

        else{

            $spare = DB::table('spare_parts')->where('sparePrtId', '=', $id)->get();

            return response()->json(['spare'=>$spare],200);

        }
       
    }
    public function editSpare(Request $rs,$id)
    {
        

        $item=DB::table('spare_parts')->where('sparePrtId', $id)->exists();

        if(!$item)
        {
            return response()->json(['msg'=>'this record is not found'],404);
        }

        else{
            DB::table('spare_parts')
            ->where('sparePrtId', $id)
            ->update( [
                'partId'=>$rs->partId,
                'sparePrtName'=>$rs->sparePrtName,
                'brand'=>$rs->brand,
                'model'=>$rs->model,
                'year'=>$rs->year,
                'price'=>$rs->price,
                'isDeleted' => 0,
           ]);

          

        }

    }
    public function deleteSpare(Request $rs,$id)
    {
        $item=DB::table('spare_parts')->where('sparePrtId', $id)->exists();

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


            DB::table('spare_parts')
            ->where('sparePrtId', $id)
            ->update( [
                'partId'=>$rs->partId,
                'brand'=>$rs->brand,
                'model'=>$rs->model,
                'year'=>$rs->year,
                'price'=>$rs->price,
                'isDeleted' => 1,
           ]);

          

        }


    }
    public function addSpare(Request $rs)
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

        DB::table('spare_parts')->insert(
            [
                'partId'=>$rs->partId,
                'sparePrtName'=>$rs->sparePrtName,
                'brand'=>$rs->brand,
                'model'=>$rs->model,
                'year'=>$rs->year,
                'price'=>$rs->price,
                'image'=>$fileName,
                'isDeleted' => 0,]
        );
    }
}

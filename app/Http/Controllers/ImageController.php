<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class ImageController extends Controller
{
    //
      public function index(){
      return view('images-upload');
    }
    public function uploadImage(Request $request)
    {
      
            $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
            ]);

            if ($validator->fails()) {
                $error = $validator->errors()->all();
                    return Response::json([
                    'error'=> $error
                    ]);

            }

          

        $imageName = time().'.'.$request->image->extension();

        
        $request->image->move(public_path('images'), $imageName);
            DB::table('images')->insert([
            'path' => $imageName,
            "created_at" =>  new \Datetime(), 
            "updated_at" => new \Datetime(), 
            ]);

        return Response::json([
            'success'=>'Image uploaded Successfully!',
            'image' => $imageName
        ]);
        
    }
}

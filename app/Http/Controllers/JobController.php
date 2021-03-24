<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Job;
use DB;

class JobController extends Controller
{
   /* public function __construct() {
        $this->middleware('auth:api', ['except' => ['getCountry','getCategory']]);
    }*/
    public function jobpost(Request $request) {
        
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|between:2,100',
            'location' => 'required',
            'job_type' => 'required',
            'category' => 'required',
            'description' => 'required',
            'compensation_from' => 'required',
            'compensation_to' => 'required',
            'currency' => 'required',
            'frequency' => 'required',
            'compensation_show' => 'required',
            'additional_info' => 'required',
        ]);

        if($validator->fails()){
             return response()->json($validator->errors(), 422);
        }
        $job = new Job;
        $job->title = $request->title;
        $job->location = $request->location;
        $job->job_type = $request->job_type;
        $job->category = $request->category;
        $job->description = $request->description;
        $job->compensation_from = $request->compensation_from;
        $job->compensation_to = $request->compensation_to;
        $job->currency = $request->currency;
        $job->frequency = $request->frequency;
        $job->compensation_show = $request->compensation_show;
        $job->additional_info = $request->additional_info;
        if ($request->hasFile('upload_file')) 
        {
            $file = $request->file('upload_file');
            $extension = $file->getClientOriginalExtension(); 
            $image_extension = ['jpeg','jpg','png','gif','svg','webp'];
            
            if(in_array($extension,$image_extension)){
                $fileName = 'upload_file'.time().'.'.$extension;
                $file->storeAs('avatars',$fileName);
                $file_path = asset('storage/avatars/' . $fileName);

                $job->upload_file = $fileName;                
            }                            
        }  
        $job->save();

        return response()->json([
            'message' => 'Job successfully posted'
        ], 201);
    }
    public function getCountry(Request $request) {
    	$country = DB::table('countries')->select('id','name')->get();
    	return response()->json($country);
    }
    public function getCategory(Request $request) {
        $categories = DB::table('categories')->select('id','name')->where('status','=','Active')->get();
        return response()->json($categories);
    }
}

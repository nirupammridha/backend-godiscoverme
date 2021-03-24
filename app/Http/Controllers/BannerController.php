<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\BannerResource;
use App\Banner;
use File;

class BannerController extends Controller
{
    public function banner_list(Request $request)
    {
        $banner_list=Banner::orderBy('id', 'desc')->get();
        
        return view('admin.banner.banner_list',compact('banner_list'));
    }
    public function banner_add(){
        return view('admin.banner.add_banner');
    }
    public function banner_create(Request $request){
        
        $this->validate($request,[
            'title' => ['required', 'string', 'max:255'],
        ]);
        
        $banner = new Banner;
        $banner->title = $request->title; 
        $banner->section_name = $request->section_name; 
        if ($request->hasFile('banner_image')) 
        {
            $image = $request->file('banner_image');
            $file_tmp = $image->getPathName();
            $name = time().'.webp';
            $destinationPath = public_path('/uploads');

            $image = imagecreatefromstring(file_get_contents($file_tmp));
             ob_start();
             imagejpeg($image,NULL,100);
             $cont = ob_get_contents();
             ob_end_clean();
             imagedestroy($image);
             $content = imagecreatefromstring($cont);
             $output = $destinationPath.'/'.$name;
             imagewebp($content,$output);
             imagedestroy($content);
             
             $banner->banner_image = $name;                          
        }
        $banner->save();

        
        \Session::flash('message','Successfully added.'); 
        return redirect()->back();
    }
    public function banner_edit($id)
    {
        $banner = Banner::find($id);
        
        return view('admin.banner.edit_banner',compact('banner'));
    }
    public function update_banner(Request $request){
        
        $this->validate($request,[
            'banner_id' => 'required'
        ]);
        
        $banner = Banner::where('id', $request->banner_id)->first();
        $banner->title = $request->title; 
        $banner->section_name = $request->section_name;
        if ($request->hasFile('banner_image')) 
        {
            $image = $request->file('banner_image');
            $file_tmp = $image->getPathName();
            $name = time().'.webp';
            $destinationPath = public_path('/uploads');

            $image = imagecreatefromstring(file_get_contents($file_tmp));
             ob_start();
             imagejpeg($image,NULL,100);
             $cont = ob_get_contents();
             ob_end_clean();
             imagedestroy($image);
             $content = imagecreatefromstring($cont);
             $output = $destinationPath.'/'.$name;
             imagewebp($content,$output);
             imagedestroy($content);
             $banner->banner_image = $name; 

             if($request->old_banner_image!=""){
                $image_path = $destinationPath."/".$request->old_banner_image;
                 if(File::exists($image_path)) {
                    File::delete($image_path);
                 } 
             }           
        }
        $banner->save();

        
        \Session::flash('message','Successfully updated.'); 
        return redirect()->back();
    }
    public function banner_delete($id)
    {
        $banner = Banner::find($id);
        $banner->delete();

        \Session::flash('message','Successfully deleted.'); 
        return redirect()->back();
    }

    public function getBanner()
    {
        $banner_list=Banner::where('section_name','=','home')->get();
        
        return BannerResource::collection($banner_list);
       // return response()->json($banner_list);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Testimonial;
use File;

class TestimonialController extends Controller
{
    public function testimonial()
    {
        return view('admin.testimonial.create_testimonial');
    }
    public function edit_testimonial($id)
    {
        $testimonial=Testimonial::where('id',$id)->first();
        return view('admin.testimonial.edit_testimonial',compact('testimonial'));
    }
    public function testimonial_list()
    {
        $testimonial_list=Testimonial::orderBY('updated_at','desc')->get();
        
        return view('admin.testimonial.testimonial_list',compact('testimonial_list'));
    }
    public function testimonial_create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:testimonials',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $testimonial = new Testimonial;
        $testimonial->title = $request->title;
        $testimonial->designation = $request->designation;
        $testimonial->description = $request->description;
        
        if ($request->hasFile('image')) 
        {
            $image = $request->file('image');
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
             
             $testimonial->image = $name;                          
        }

        $testimonial->status = $request->status;
        $testimonial->save();
        \Session::flash('message','Successfully saved.');

        return redirect()->back();
    }
    public function update_testimonial(Request $request)
    {
       $this->validate($request, [
            'title' => 'required|unique:testimonials,title,'.$request->testimonial_id,
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $testimonial = Testimonial::where('id',$request->testimonial_id)->first();
        $testimonial->title = $request->title;
        $testimonial->designation = $request->designation;
        $testimonial->description = $request->description;

        if ($request->hasFile('image')) 
        {
            $image = $request->file('image');
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
             $testimonial->image = $name; 

             if($request->old_image!=""){
                $image_path = $destinationPath."/".$request->old_image;
                 if(File::exists($image_path)) {
                    File::delete($image_path);
                 } 
             }           
        }         
         $testimonial->status = $request->status;
         $testimonial->save();

        \Session::flash('message','Successfully updated.');        

        return redirect()->back();
    }
}

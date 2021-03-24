<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Yajra\Datatables\DataTables;
use Illuminate\Contracts\Mail\Mailer;
use App\Contact;
use App\User;
use DB;

class UserController extends Controller
{
    public function user_list(Request $request)
    {
    	$user_list=User::orderBy('updated_at', 'desc')->get();
        
        return view('admin.user.user_list',compact('user_list'));
    }
    public function user_edit($id)
    {
        $user = User::find($id);
        
        return view('admin.user.edit_user',compact('user'));
    }
    public function user_add(){
        return view('admin.user.create_user');
    }
     public function user_create(Request $request){
        $params = $request->all();
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'mobile_no' => ['required','unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
        ]);
        
        $user = new User;
        $user->name = $params['name'];
        $user->email = $params['email'];
        $user->mobile_no = $params['mobile_no'];
        $user->age = $params['age'];
        $user->school = $params['school'];
        $user->occupation = $params['occupation'];
        $user->company = $params['company'];
        $user->password = Hash::make($params['password']);

        if ($request->hasFile('avatar')) 
        {
            $this->validate($request,[
                'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
            $image = $request->file('avatar');
            $file_tmp = $image->getPathName();
            $name = time().'.webp';
            $destinationPath = public_path('storage/avatars');           

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

             $user->avatar = $name;                 
        }

        $user->save();

        
        \Session::flash('message','User successfully added.'); 
        return redirect()->back();
    }
    public function update_user(request $request)
    {
        $params = $request->all();
        $this->validate($request,[
        'name' => 'required',
        ]);
        $user = User::where('id', $params['user_id'])->first();
        $user->name = $params['name'];
        $user->email = $params['email'];
        $user->mobile_no = $params['mobile_no'];
        $user->age = $params['age'];
        $user->school = $params['school'];
        $user->occupation = $params['occupation'];
        $user->company = $params['company'];

        if ($request->hasFile('avatar')) 
        {
            $this->validate($request,[
                'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
            $image = $request->file('avatar');
            $file_tmp = $image->getPathName();
            $name = time().'.webp';
            $destinationPath = public_path('storage/avatars');           

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
             $user->avatar = $name; 

             if($request->old_avatar!=""){
                $image_path = $destinationPath."/".$request->old_avatar;
                 if(File::exists($image_path)) {
                    File::delete($image_path);
                 } 
             }                    
        }
        if($request->password!=""){
            $user->password = Hash::make($request->password);
        } 

        $user->save();

        \Session::flash('message','Successfully updated.'); 
        return redirect()->back();
    }
    public function social_links($id)
    {
        $user_id = $id;
        $user = DB::table('social_links')->where('user_id',$user_id)->first();        
        return view('admin.user.social_links',compact('user','user_id'));
    }
    public function update_social_links(request $request)
    {
        $params = $request->all();
        $this->validate($request,[
        'user_id' => 'required',
        ]);
        $data = DB::table('social_links')->updateOrInsert(
            [
            'user_id' => $params['user_id']
            ],
            [
            'facebook_link' => $params['facebook_link'],
            'twitter_link' => $params['twitter_link'],
            'instagram_link' => $params['instagram_link'],
            'linkedin_link' => $params['linkedin_link'],
            ]
        );

        \Session::flash('message','Successfully updated.'); 
        return redirect()->back();
    }
    public function contacts($id)
    {
        $user_id = $id;
        $user = DB::table('contacts')->where('user_id',$user_id)->first();        
        return view('admin.user.contacts',compact('user','user_id'));
    }
    public function update_contacts(request $request)
    {
        $params = $request->all();
        $this->validate($request,[
        'user_id' => 'required',
        ]);
        $data = Contact::updateOrCreate(
            [
            'user_id' => $params['user_id']
            ],
            [
            'full_name' => $params['full_name'],
            'email' => $params['email'],
            'subject' => $params['subject'],
            'message' => $params['message'],
            ]
        );

        \Session::flash('message','Successfully updated.'); 
        return redirect()->back();
    }

    public function deleteUser($id)
    {
        $userDetails = User::find($id);
        if(!empty($userDetails->avatar))
        {
            if(file_exists(public_path().'/storage/avatars/'.$userDetails->avatar)){
                if ($userDetails->avatar !='no-image.jpg') {
                    unlink(public_path().'/storage/avatars/'.$userDetails->avatar);
                }
            }
        }
        $userDetails->delete();
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Help;
use App\Term;
use App\Safty;
use App\Level;
use App\Experience;
use App\PreText;
use DB;

class AdminController extends Controller
{
    public function help_list(Request $request)
    {
    	$help_list=Help::orderBy('updated_at', 'desc')->get();
        
        return view('admin.help.help_list',compact('help_list'));
    }
    public function help_add(){
        return view('admin.help.add_help');
    }
    public function help_create(Request $request){
        $params = $request->all();
        $this->validate($request,[
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
        ]);
        
        $help = new Help;
        $help->title = $params['title'];
        $help->description = $params['description']; 
        $help->save();

        
        \Session::flash('message','Successfully added.'); 
        return redirect()->back();
    }
    public function help_edit($id)
    {
        $help = Help::find($id);
        
        return view('admin.help.edit_help',compact('help'));
    }
    public function update_help(Request $request){
        $params = $request->all();
        $this->validate($request,[
            'help_id' => 'required'
        ]);
        
        $help = Help::where('id', $params['help_id'])->first();
        $help->title = $params['title'];
        $help->description = $params['description']; 
        $help->save();

        
        \Session::flash('message','Successfully updated.'); 
        return redirect()->back();
    }

    public function terms_list(Request $request)
    {
    	$terms_list=Term::orderBy('updated_at', 'desc')->get();
        
        return view('admin.terms.terms_list',compact('terms_list'));
    }
    public function terms_add(){
        return view('admin.terms.add_terms');
    }
    public function terms_create(Request $request){
        $params = $request->all();
        $this->validate($request,[
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
        ]);
        
        $terms = new Term;
        $terms->title = $params['title'];
        $terms->description = $params['description']; 
        $terms->save();

        
        \Session::flash('message','Successfully added.'); 
        return redirect()->back();
    }
    public function terms_edit($id)
    {
        $terms = Term::find($id);
        
        return view('admin.terms.edit_terms',compact('terms'));
    }
    public function update_terms(Request $request){
        $params = $request->all();
        $this->validate($request,[
            'terms_id' => 'required'
        ]);
        
        $terms = Term::where('id', $params['terms_id'])->first();
        $terms->title = $params['title'];
        $terms->description = $params['description']; 
        $terms->save();

        
        \Session::flash('message','Successfully updated.'); 
        return redirect()->back();
    }

    public function safties_list(Request $request)
    {
    	$safties_list=Safty::orderBy('updated_at', 'desc')->get();
        
        return view('admin.safties.safties_list',compact('safties_list'));
    }
    public function safties_add(){
        return view('admin.safties.add_safties');
    }
    public function safties_create(Request $request){
        $params = $request->all();
        $this->validate($request,[
            'description' => ['required', 'string', 'max:255'],
        ]);
        
        $safties = new Safty;
        $safties->description = $params['description']; 
        $safties->save();

        
        \Session::flash('message','Successfully added.'); 
        return redirect()->back();
    }
    public function safties_edit($id)
    {
        $safties = Safty::find($id);
        
        return view('admin.safties.edit_safties',compact('safties'));
    }
    public function update_safties(Request $request){
        $params = $request->all();
        $this->validate($request,[
            'safties_id' => 'required'
        ]);
        
        $safties = Safty::where('id', $params['safties_id'])->first();
        $safties->description = $params['description']; 
        $safties->save();

        
        \Session::flash('message','Successfully updated.'); 
        return redirect()->back();
    }

    public function level_list(Request $request)
    {
        $level_list=Level::orderBy('id', 'desc')->get();
        
        return view('admin.level.level_list',compact('level_list'));
    }
    public function level_add(){
        return view('admin.level.add_level');
    }
    public function level_create(Request $request){
        $params = $request->all();
        $this->validate($request,[
            'title' => ['required', 'string', 'max:255'],
        ]);
        
        $level = new Level;
        $level->title = $params['title']; 
        $level->save();

        
        \Session::flash('message','Successfully added.'); 
        return redirect()->back();
    }
    public function level_edit($id)
    {
        $level = Level::find($id);
        
        return view('admin.level.edit_level',compact('level'));
    }
    public function update_level(Request $request){
        $params = $request->all();
        $this->validate($request,[
            'level_id' => 'required'
        ]);
        
        $level = Level::where('id', $params['level_id'])->first();
        $level->title = $params['title']; 
        $level->save();

        
        \Session::flash('message','Successfully updated.'); 
        return redirect()->back();
    }
    public function level_delete($id)
    {
        $level = Level::find($id);
        $level->delete();

        \Session::flash('message','Successfully deleted.'); 
        return redirect()->back();
    }

    public function experience_list(Request $request)
    {
        $experience_list=Experience::orderBy('id', 'desc')->get();
        
        return view('admin.experience.experience_list',compact('experience_list'));
    }
    public function experience_add(){
        return view('admin.experience.add_experience');
    }
    public function experience_create(Request $request){
        $params = $request->all();
        $this->validate($request,[
            'title' => ['required', 'string', 'max:255'],
        ]);
        
        $experience = new Experience;
        $experience->title = $params['title']; 
        $experience->save();

        
        \Session::flash('message','Successfully added.'); 
        return redirect()->back();
    }
    public function experience_edit($id)
    {
        $experience = Experience::find($id);
        
        return view('admin.experience.edit_experience',compact('experience'));
    }
    public function update_experience(Request $request){
        $params = $request->all();
        $this->validate($request,[
            'experience_id' => 'required'
        ]);
        
        $experience = Experience::where('id', $params['experience_id'])->first();
        $experience->title = $params['title']; 
        $experience->save();

        
        \Session::flash('message','Successfully updated.'); 
        return redirect()->back();
    }
    public function experience_delete($id)
    {
        $experience = Experience::find($id);
        $experience->delete();

        \Session::flash('message','Successfully deleted.'); 
        return redirect()->back();
    }

    public function pretext_list(Request $request)
    {
        $pretext_list=PreText::orderBy('id', 'desc')->get();
        
        return view('admin.pretext.pretext_list',compact('pretext_list'));
    }
    public function pretext_add(){
        return view('admin.pretext.add_pretext');
    }
    public function pretext_create(Request $request){
        $params = $request->all();
        $this->validate($request,[
            'title' => ['required', 'string', 'max:255'],
        ]);
        
        $pretext = new PreText;
        $pretext->title = $params['title']; 
        $pretext->save();

        
        \Session::flash('message','Successfully added.'); 
        return redirect()->back();
    }
    public function pretext_edit($id)
    {
        $pretext = PreText::find($id);
        
        return view('admin.pretext.edit_pretext',compact('pretext'));
    }
    public function update_pretext(Request $request){
        $params = $request->all();
        $this->validate($request,[
            'pretext_id' => 'required'
        ]);
        
        $pretext = PreText::where('id', $params['pretext_id'])->first();
        $pretext->title = $params['title']; 
        $pretext->save();

        
        \Session::flash('message','Successfully updated.'); 
        return redirect()->back();
    }
    public function pretext_delete($id)
    {
        $pretext = PreText::find($id);
        $pretext->delete();

        \Session::flash('message','Successfully deleted.'); 
        return redirect()->back();
    }
}

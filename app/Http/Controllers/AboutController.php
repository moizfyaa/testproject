<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AboutController extends Controller
{
    public function about()
    {
        $data = Team::all();
        return view('about', compact('data'));
    }

    public function addteam()
    {
        if(Auth::id())
        {
         if(Auth::user()->usertype=='1')
         {
             return view('admin.team.addteamadmin');
         }
         else
         {
            return redirect()->back();
         }
        }
        else
        {
            return redirect('login');
        }    
    }

    public function addnewmember(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'image' => 'required',
        ]);

        $data=new Team;
        
        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $filename=time() .'.'. $extension;
        $image->move('uploads/product/',$filename);
        $data->image = $filename;                   

        $data->name=$request->name;
        $data->designation=$request->designation;
        $data->save();
        return redirect()->route('showteam')->with('success', 'Team Member Added Succesfully');     
   }

   public function showteam()
   {
    if(Auth::id())
    {
     if(Auth::user()->usertype=='1')
     {
         $data = Team::all();
         return view('admin.team.showteam', compact('data'));
     }
     else
     {
        return redirect()->back();
     }
    }
    else
    {
        return redirect('login');
    }
   }

   public function update_team_view($id)
   {
        $data = Team::find($id);
        return view('admin.team.update_team_view', compact('data'));
   }

   public function updateteam(Request $request, $id)
   {
      $data = Team::find($id);   

      if($request->image){
      $image = $request->file('image');
      $extension = $image->getClientOriginalExtension();
      $filename=time() .'.'. $extension;
      $image->move('uploads/product/',$filename);
      $data->image = $filename;                   
     }
      $data->name=$request->name;
      $data->designation=$request->designation;
      $data->save();
      return redirect()->back()->with('success', 'Team Updated Succesfully');
   }

   public function deleteteam($id)
   {
        $data = Team::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Team Deleted Successfully');
   }
}

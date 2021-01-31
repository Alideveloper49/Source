<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $settings = Setting::first();
        return view('Admin.profile.index',compact('user','settings'));
    }

    public function upload(request $request)
    {
        $validated =  Validator::make($request->all(), [
            'image' => ['required','max:2048'],
        ]);

        $inputs = $request->all();

        if($validated->fails()) {
            $notification=array(
                'message' => $validated->errors(),
                'alert-type' => 'warning'
            );
            return redirect('Profile')
                ->with($notification);
            //return redirect()->back()->withErrors($validated->errors());
        }

        if($request->hasFile('image')){
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('image');
            $image->move($destinationPath, $name);
            $inputs['image'] = $name;
        }
        User::where('id',auth()->user()->id)->update([
            'image' => $inputs['image']
        ]);
        $notification=array(
            'message' => 'Successfully Profile Image Upload',
            'alert-type' => 'success'
        );
        return redirect()->back()
            ->with($notification);
    }

    public function Company_Update(request $request)
    {
        $validated = Validator::make($request->all(),[
            'App_name' => ['required'],
            'Company_name' => ['required'],
        ]);

        if($validated->fails()) {
            $notification=array(
                'message' => $validated->errors(),
                'alert-type' => 'warning'
            );
            return redirect('Profile')
                ->with($notification);
            //return redirect()->back()->withErrors($validated->errors());
        }

        Setting::where('creator' ,'Ali Ahmed')->update([
            'App_name' => $request->App_name,
            'Company_name' => $request->Company_name,
        ]);

        $notification=array(
            'message' => 'Successfully Change Settings',
            'alert-type' => 'success'
        );
        return redirect()->back()
            ->with($notification);
    }
}

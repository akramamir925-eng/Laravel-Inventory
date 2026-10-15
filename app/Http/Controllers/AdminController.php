<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function destroy(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'User Logout Successfully',
            'alert-type' => 'success'
        );

        return redirect('/login')->with($notification);
    } 

    public function ProfileView(){
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('admin.admin_profile_view', compact('userData'));
    }

    public function EditProfile() {
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('admin.admin_profile_edit', compact('editData'));
    }

    public function StoreProfile(Request $request) {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username;
        if($request->file('profile_image')){
            $file = $request->file('profile_image');
            
            $filename = date('YmHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['profile_image'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('admin.profile')->with($notification);
    }

    public function ChangerPassword(){
        return view('admin.admin_change_password');
    }

    public function UpdatePassword(Request $request) {
        $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirm_password' => 'required|same:newpassword',
        ]);

        $haspassword = Auth::user()->password;
        if(Hash::check($request->oldpassword,$haspassword)){
            $users = User::find(Auth::id());
            $users->password = bcrypt($request->newpassword);
            $users->save();

            session()->flash('message', 'Password Upadated Successfully');
            return redirect()->back();
        }else{
            session()->flash('message', 'Old Password Is Not Match');
            return redirect()->back();
        }
    }

}



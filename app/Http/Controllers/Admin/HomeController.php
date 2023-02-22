<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HomeController extends Controller



{
    public function profile()
    {
        $current_user = Auth::user();
        return view('profile', compact('current_user'));
    }

    public function index()
    {
        if (Auth::user()->type == User::USER_TYPE_ADMIN) {
            $users = User::with(["areas"])->where("type", User::USER_TYPE_USER)->get();
        } else {
            $users = User::with(["areas"])->where("type", User::USER_TYPE_USER)->where("parent_id", Auth::user()->id)->get();
        }
        return view('admin.users.activities', compact('users'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:100',
            'phone' => 'required|string|size:11',
            'address' => 'required|string|min:2|max:200',
            'designation' => 'nullable|string',
            'image' => 'nullable|image|mimes:png,jpg,webp,jpeg',
        ]);

        $current_user = User::findOrFail(Auth::user()->id);
        $current_user->name = $request->input("name");
        $current_user->phone = $request->input("phone");
        $current_user->email = $request->input("email");
        $current_user->designation = $request->input("designation");
        $current_user->address = $request->input("address");
        $current_user->agencyname = $request->input("agencyname");
        $image = $request->file("image");
        if ($image) {
            if ($current_user->image && Storage::disk("public")->fileExists($current_user->image)) {
                Storage::disk("public")->delete($current_user->image);
            }
            $filename = Str::slug($request->input("name", "user")) . "-" . time() . '.' . $image->getClientOriginalExtension();
            $path = Storage::disk("public")->putFileAs('users', $image, $filename);
            $current_user->image = $path;
        }

        $current_user->save();

        return redirect()->back()->with("success", "Profile updated successfully");
    }

   
    
}
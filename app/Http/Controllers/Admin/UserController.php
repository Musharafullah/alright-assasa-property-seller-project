<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\User;
use Auth;
use DB;
use Hash;
use Illuminate\Http\Request;
use Storage;
use Str;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::user()->type == User::USER_TYPE_ADMIN) {
            $users = User::with(["areas"])->where("type", User::USER_TYPE_USER)->get();
        } else {
            $users = User::with(["areas"])->where("type", User::USER_TYPE_USER)->where("parent_id", Auth::user()->id)->get();
        }
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $areas = Area::all();
        return view('admin.users.add', ["areas" => $areas]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:100',
            'phone' => 'required|string|size:11',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|max:20',
            'designation' => 'nullable|string',
            'image' => 'nullable|image|mimes:png,jpg,webp,jpeg',
            "area" => "required|array"
        ]);

        $user = new User();
        $user->name = $request->input("name");
        $user->phone = $request->input("phone");
        $user->email = $request->input("email");
        $user->password = Hash::make($request->input("password"));
        $user->parent_id = Auth::user()->id;
        $user->type = User::USER_TYPE_USER;
        $user->designation = $request->input("designation");
        $user->address = $request->input("address");
        $image = $request->file("image");
        if ($image) {
            $filename = Str::slug($request->input("name", "user")) . "-" . time() . '.' . $image->getClientOriginalExtension();
            $path = Storage::disk("public")->putFileAs('users', $image, $filename);
            $user->image = $path;
        }
        $user->save();

        $area_ids = $request->input("area");
        if ($area_ids && is_array($area_ids) && sizeof($area_ids) > 0) {
            $area_data = [];
            foreach ($area_ids as $area_id) {
                $area_data[] = [
                    "user_id" => $user->id,
                    "area_id" => $area_id,
                    "created_at" => now(),
                    "updated_at" => now(),
                ];
            }
            DB::table("area_user")->insert($area_data);
        }

        return redirect(url("/admin/users"))->with("success", "User created successfully");
    }
    public function update(Request $request, $user_id)
    {
        $user = User::findOrFail($user_id);
        $request->validate([
            'name' => 'required|string|min:2|max:100',
            'phone' => 'required|string|size:11',
            'email' => 'required|email',
            'designation' => 'nullable|string',
            'image' => 'nullable|image|mimes:png,jpg,webp,jpeg',
            "area" => "required|array"
        ]);

        $user->name = $request->input("name");
        $user->phone = $request->input("phone");
        $user->email = $request->input("email");
        $user->designation = $request->input("designation");
        $user->address = $request->input("address");
        $image = $request->file("image");
        if ($image) {
            if ($user->image && Storage::disk("public")->fileExists($user->image)) {
                Storage::disk("public")->delete($user->image);
            }
            $filename = Str::slug($request->input("name", "user")) . "-" . time() . '.' . $image->getClientOriginalExtension();
            $path = Storage::disk("public")->putFileAs('users', $image, $filename);
            $user->image = $path;
        }
        $user->save();

        $area_ids = $request->input("area");
        if ($area_ids && is_array($area_ids) && sizeof($area_ids) > 0) {
            $area_data = [];
            foreach ($area_ids as $area_id) {
                $area_data[] = [
                    "user_id" => $user->id,
                    "area_id" => $area_id,
                    "created_at" => now(),
                    "updated_at" => now(),
                ];
            }
            DB::table("area_user")->where("user_id", $user->id)->delete();
            DB::table("area_user")->insert($area_data);
        }

        return redirect(url("/admin/users"))->with("success", "User updated successfully");
    }
    public function edit($user_id)
    {
        $user = User::findOrFail($user_id);
        $areas = Area::all();
        return view('admin.users.update', ["user" => $user, "areas" => $areas]);
    }
    // public function destroy(Request $request, $user_id)
    // {
    //     $user = User::findOrFail($user_id);
    //     if ($user->properties()->count() > 0) {
    //         return back()->with("error", "User has inventory with it. Please delete invetory first");
    //     }
    //     if ($user->image && Storage::disk("public")->fileExists($user->image)) {
    //         Storage::disk("public")->delete($user->image);
    //     }
    //     DB::table("area_user")->where("user_id", $user->id)->delete();
    //     $user->delete();

    //     return redirect(url("/admin/users"))->with("success", "User deleted successfully");
    // }

    public function user($id) {
        $user = User::find($id);
        return view('admin.users.user', ["user" => $user]);
    
}

public function isActive($id){
    $active = User::find($id);
    $active->is_active = 0;
    $active->update();
    return redirect()->back();

}
public function activeSub($id){
    $activeSub = User::find($id);
    $activeSub->file = 1;
    $activeSub->update();
    return redirect()->back();

}
public function inactiveSub($id){
    $activeSub = User::find($id);
    $activeSub->file = 0;
    $activeSub->update();
    return redirect()->back();

}
public function Count(){
    $count = Model::where('item_status')->count();
    return view("admin.inventory",compact('count'));
}
}
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

class DealerController extends Controller
{
    public function index(Request $request)
    {
        $users = User::with(["areas"])->where("type", User::USER_TYPE_DEALER)->get();
        return view('admin.dealers.index', compact('users'));
    }

    public function create()
    {
        $areas = Area::all();
        return view('admin.dealers.add', ["areas" => $areas]);
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
        $user->type = User::USER_TYPE_DEALER;
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

        return redirect(url("/admin/dealers"))->with("success", "Dealers created successfully");
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

        return redirect(url("/admin/dealers"))->with("success", "Dealer updated successfully");
    }
    public function edit($user_id)
    {
        $user = User::findOrFail($user_id);
        $areas = Area::all();
        return view('admin.dealers.update', ["user" => $user, "areas" => $areas]);
    }
    public function delete($user_id)
    {
        $user = User::findOrFail($user_id);
        if ($user->properties()->count() > 0) {
            return back()->with("error", "Dealers has inventory with it. Please delete invetory first");
        }
        if ($user->child_users()->count() > 0) {
            return back()->with("error", "Dealers has users with it. Please delete users first");
        }
        if ($user->image && Storage::disk("public")->fileExists($user->image)) {
            Storage::disk("public")->delete($user->image);
        }
        DB::table("area_user")->where("user_id", $user->id)->delete();
        $user->delete();

        return redirect(url("/admin/dealers"))->with("success", "Dealer deleted successfully");
    }

    public function details($id){
        
        if (Auth::user()->type == User::USER_TYPE_ADMIN) {
            $users = User::with(["areas"])->where("type", User::USER_TYPE_USER)->where('parent_id',$id)->get();
        } else {
            $users = User::with(["areas"])->where("type", User::USER_TYPE_USER)->where("parent_id", $id)->get();
        }
        return view('admin.dealers.details',compact('users'));
        }


}
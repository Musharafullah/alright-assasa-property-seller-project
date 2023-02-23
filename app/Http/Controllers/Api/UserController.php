<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Validator;

class UserController extends BaseController
{
    public function admins()
    {
        $users = User::with(["areas"])->where("type", User::USER_TYPE_ADMIN)->get();
        return $this->sendSuccessResponse($users->jsonSerialize());
    }
    public function dealers()
    {
        $users = User::with(["areas"])->where("type", User::USER_TYPE_DEALER)->get();
        return $this->sendSuccessResponse($users->jsonSerialize());
    }
    public function users()
    {
        $users = User::with(["areas"])->where("type", User::USER_TYPE_USER)->get();
        return $this->sendSuccessResponse($users->jsonSerialize());
    }
    public function dealerUsers($dealer_id)
    {
        $users = User::with(["areas"])->where("type", User::USER_TYPE_USER)->where("parent_id", $dealer_id)->get();
        return $this->sendSuccessResponse($users->jsonSerialize());
    }

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:2|max:100',
            'phone' => 'required|string|size:11',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|max:20',
            'parent_id' => 'nullable|exists:users,id',
            'type' => ['required', Rule::in(User::USER_TYPES)],
            'designation' => 'nullable|string',
            'image' => 'nullable|image|mimes:png,jpg,webp,jpeg',
            'address' => 'required|string|min:10',
            'agencyname' => 'nullable|string',
            "area_ids" => "nullable|string"
        ]);
        if ($validator->fails()) {
            return $this->sendErrorResponse($validator->getMessageBag()->first(), $validator->errors()->toArray());
        }

        $user = new User();
        $user->name = $request->input("name");
        $user->phone = $request->input("phone");
        $user->email = $request->input("email");
        $user->password = Hash::make($request->input("password"));
        $user->parent_id = $request->input("parent_id");
        $user->type = $request->input("type");
        $user->designation = $request->input("designation");
        $user->address = $request->input("address");
        $user->agencyname = $request->input("agencyname");

        $image = $request->file("image");
        if ($image) {
            $filename = Str::slug($request->input("name", "user")) . "-" . time() . '.' . $image->getClientOriginalExtension();
            $path = Storage::disk("public")->putFileAs('users', $image, $filename);
            $user->image = $path;
        }
        $user->save();

        $area_ids = json_decode($request->input("area_ids"));
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

        return $this->sendSuccessResponse($user->jsonSerialize(), "New user created successfully");
    }

    public function removeUserImage($user_id)
    {
        $user = User::findOrFail($user_id);
        if ($user->image && Storage::disk("public")->fileExists($user->image)) {
            Storage::disk("public")->delete($user->image);
            $user->image = null;
            $user->save();
        }
        return $this->sendSuccessResponse($user->jsonSerialize(), "Image removed successfully");
    }

    function delete($id)
    {
        $user = User::findOrFail($id);
        if ($user->properties()->count() > 0) {
            return $this->sendErrorResponse("User has inventory with it. Please delete invetory first");
        }
        if ($user->image && Storage::disk("public")->fileExists($user->image)) {
            Storage::disk("public")->delete($user->image);
        }
        $user->delete();
        return $this->sendSuccessResponse([], "User deleted successfully");
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:2|max:100',
            'phone' => 'required|string|size:11',
            'designation' => 'nullable|string',
            'image' => 'nullable|image|mimes:png,jpg,webp,jpeg',
            'address' => 'required|string|min:10',
            'agencyname' => 'nullable|string',
        ]);
        if ($validator->fails()) {
            return $this->sendErrorResponse($validator->getMessageBag()->first(), $validator->errors()->toArray());
        }

        $user = User::findOrFail($id);
        $user->name = $request->input("name");
        $user->phone = $request->input("phone");
        $user->designation = $request->input("designation");
        $user->address = $request->input("address");
        $user->agencyname = $request->input("agencyname");

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
        return $this->sendSuccessResponse($user->jsonSerialize(), "User updated successfully");
    }
}
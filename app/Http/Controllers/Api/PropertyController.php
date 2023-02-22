<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;

class PropertyController extends BaseController
{
    public function index()
    {
        
       
        $properties = Property::with(["area", "user", "phase"])->get();
       foreach($properties as $p){
$p->category = json_decode($p->category);
}
        return $this->sendSuccessResponse($properties->jsonSerialize());
    }

    public function userInventory($user_id)
    {
        $properties = Property::with(["area", "user", "phase"])->where("user_id", $user_id)->get();
        return $this->sendSuccessResponse($properties->jsonSerialize());
    }
    public function updateInventoryStatus(Request $request, $inventory_id)
    {
        $validator = Validator::make($request->all(), [
            'purchase_status' => ['required', Rule::in(Property::PROPERTY_EXTRAS["purchase_statuses"])],
        ]);

        if ($validator->fails()) {
            return $this->sendErrorResponse("Please fill all fields for inventory", $validator->errors()->toArray());
        }

        $property = Property::find($inventory_id);
        if (is_null($property)) {
            return $this->sendErrorResponse("Inventory not found");
        }
        $property->purchase_status = $request->input("purchase_status");
        $property->save();

        return $this->sendSuccessResponse($property->jsonSerialize(), "Inventory status updated successfully");
    }

    public function add(Request $request)
    {
        // $request->validate([
        //     'user_id' => 'required|exists:users,id',
        //     'agency_name' => 'required|string|min:2|max:100',
        //     'item_condition' => 'required|string|min:2|max:100',
        //     'extra_land' => 'nullable',
        //     'orientation' => 'required',
        //     'sector' => 'required',
        //     'street_number' => 'required',
        //     'size' => 'required',
        //     'price' => 'required',
        //     'item_status'=>'require',
        //     'purchase_status' => 'required|in:pending,sold',
        //     'property' => 'required|in:rent,sale',
        //     'plot_type' => 'required|in:residential,commercial,others',
        //     'area_id' => 'required|exists:areas,id',
        //     'area_phase_id' => 'required|exists:area_phases,id',
        //     'plot_number' => 'nullable',
        //     'size_unit' => 'required|in:marla,kanal,hectare',
        //     'orientation' => 'required',
            
        //     'reference_mobile' => 'required',
        // ]);
        $cat = explode(",",$request->input("category"));
       

        $property = new Property();
        $property->user_id = $request->input("user_id");
        $property->agency_name = $request->input("agency_name");
        $property->item_condition = $request->input("item_condition");
        $property->extra_land = $request->input("extra_land");
        $property->orientation = $request->input("orientation");
        $property->sector = $request->input("sector");
        $property->street_number = $request->input("street_number");
        $property->size = $request->input("size");
        $property->price = $request->input("price");
        $property->item_status = $request->input("item_status");     
        $property->purchase_status = $request->input("purchase_status");
        $property->property = $request->input("property");
        $property->plot_type = $request->input("plot_type");
        $property->area_id = $request->input("area_id");
        $property->area_phase_id = $request->input("area_phase_id");
        $property->plot_number = $request->input("plot_number");
        $property->house_number = $request->input("house_number");
        $property->size_unit = $request->input("size_unit");
        $property->orientation = $request->input("orientation");
        // $property->category = json_encode($request->input("category"));
         $property->category = json_encode($cat);
        $property->reference_mobile = $request->input("reference_mobile");

        $property->save();
        
        
        $property->category = json_decode($property->category);
        return $this->sendSuccessResponse($property->jsonSerialize(), "New inventory created successfully");
    }

    function delete($id)
    {
        $property = Property::find($id);
        if (is_null($property)) {
            return $this->sendErrorResponse("Property not found");
        }
        $property->delete();
        return $this->sendSuccessResponse([], "Inventory deleted successfully");
    }
    public function update(Request $request, $id)
    {
         $request->validate([
        //     'user_id' => 'required|string|min:2|max:100',
        //     'agency_name' => 'required|string|min:2|max:100',
        //     'item_condition' => 'required|string|min:2|max:100',
        //      'extra_land' => 'nullable',
        //     'orientation' => 'required',
        //     'sector' => 'required',
        //     'street_number' => 'required',
        //     'size' => 'required',
        //     'price' => 'required',
            'purchase_status' => 'required|in:pending,sold',
        //     'property' => 'required|in:rent,sale',
        //     'plot_type' => 'required|in:residential,commercial,others',
        //     'area_id' => 'required|exists:areas,id',
        //     'area_phase_id' => 'required|exists:area_phases,id',
        //     'plot_number' => 'nullable',
        //     'size_unit' => 'required|in:marla,kanal,hectare',
        //     'item_status'=>'require',
        //     'category' => 'required',
        //     'reference_mobile' => 'required',

     ]);
     $cat = explode(",",$request->input("category"));
        $property = Property::find($id);
        if (is_null($property)) {
            return $this->sendErrorResponse("Property not found");
        }
        $property->user_id = $request->input("user_id");
        $property->agency_name = $request->input("agency_name");
        $property->item_condition = $request->input("item_condition");
        $property->extra_land = $request->input("extra_land");
        $property->orientation = $request->input("orientation");
        $property->sector = $request->input("sector");
        $property->street_number = $request->input("street_number");
        $property->size = $request->input("size");
        $property->price = $request->input("price");
        $property->purchase_status = $request->input("purchase_status");
        $property->item_status = $request->input("item_status");
        $property->property = $request->input("property");
        $property->plot_type = $request->input("plot_type");
        $property->area_id = $request->input("area_id");
        $property->area_phase_id = $request->input("area_phase_id");
        $property->plot_number = $request->input("plot_number");
        $property->house_number = $request->input("house_number");
        $property->size_unit = $request->input("size_unit");
        $property->orientation = $request->input("orientation");
        // $property->category = json_encode($request->input("category"));
        $property->category = json_encode($cat);
        $property->reference_mobile = $request->input("reference_mobile");

        $property->save();
        $property->category = json_decode($property->category);
        return $this->sendSuccessResponse($property->jsonSerialize(), "Inventory updated successfully");
    }
    
    public function allAgency()
    {
        $users = User::distinct()->get('agencyname');
        return $this->sendSuccessResponse($users->jsonSerialize());
    }
}
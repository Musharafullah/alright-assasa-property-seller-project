<?php

namespace App\Http\Controllers\Admin;

use App\Exports\PropertyExport;
use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Property;
use App\Models\User;
use Auth;
use DB;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;
use Storage;
use Str;

class InventoryController extends Controller
{
    public function index(Request $request)
    {
    
        if (Auth::user()->type == User::USER_TYPE_ADMIN) {
            $properties = Property::with(["area", "user", "phase"])->get();
            $areas = Area::query()->limit(4)->get();
            $areas_inventory = [];
            foreach ($areas as $area) {
                $areas_inventory[] = [
                    "name" => $area->name,
                    "inventory_count" => Property::where("area_id", $area->id)->count()
                ];
            }
        } else if (Auth::user()->type == User::USER_TYPE_DEALER) {
            $properties = Property::with(["area", "user", "phase"])->whereHas("user", function ($query) {
                $query->where("id", Auth::user()->id)->orWhere("parent_id", Auth::user()->id);
            })->get();
            $areas = Area::query()->limit(4)->get();
            $areas_inventory = [];
            foreach ($areas as $area) {
                $areas_inventory[] = [
                    "name" => $area->name,
                    "inventory_count" => Property::where("area_id", $area->id)->whereHas("user", function ($query) {
                        $query->where("id", Auth::user()->id)->orWhere("parent_id", Auth::user()->id);
                    })->count()
                ];
            }
        } else {
            $properties = Auth::user()->properties;
            $areas = Area::query()->limit(4)->get();
            $areas_inventory = [];
            foreach ($areas as $area) {
                $areas_inventory[] = [
                    "name" => $area->name,
                    "inventory_count" => Property::where("area_id", $area->id)->where("user_id", Auth::user()->id)->count()
                ];
            }
        }
        $purchase_statuses = Property::PROPERTY_EXTRAS["purchase_statuses"];
        return view('admin.inventory.index', compact('properties', 'areas_inventory', 'purchase_statuses'));
    }

    public function create()
    {
        $areas = Area::all();
        $properties = Property::PROPERTY_EXTRAS["properties"];
        $item_statuses = Property::PROPERTY_EXTRAS["item_statuses"];
        $plot_types = Property::PROPERTY_EXTRAS["plot_types"];
        $statuses = Property::PROPERTY_EXTRAS["statuses"];
        $size_units = Property::PROPERTY_EXTRAS["size_units"];
        $user_types = Property::PROPERTY_EXTRAS["user_types"];
        $orientations = Property::PROPERTY_EXTRAS["orientations"];
        $categories = Property::PROPERTY_EXTRAS["categories"];
        $item_conditions = Property::PROPERTY_EXTRAS["item_conditions"];
        $purchase_statuses = Property::PROPERTY_EXTRAS["purchase_statuses"];

        return view('admin.inventory.add', compact('areas', 'item_conditions', 'purchase_statuses', 'properties', 'item_statuses', 'plot_types', 'statuses', 'size_units', 'user_types', 'orientations', 'categories'));
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'property' => ['required', Rule::in(Property::PROPERTY_EXTRAS['properties'])],
            'area_id' => 'required|exists:areas,id',
            'area_phase_id' => 'required|exists:area_phases,id',
            'client_name' => 'required|string|min:2|max:100',
            'item_condition' => 'required|string|min:2|max:100',
            'item_status' => ['required', Rule::in(Property::PROPERTY_EXTRAS['item_statuses'])],
            'size' => 'required',
            'size_unit' => ['required', Rule::in(Property::PROPERTY_EXTRAS['size_units'])],
            'extra_land' => 'nullable',
            'orientation' => ['required', Rule::in(Property::PROPERTY_EXTRAS['orientations'])],
            'sector' => 'required',
            'street_number' => 'required',
            'price' => 'required',
            'category' => 'required',
            'reference_mobile' => 'nullable|size:11',
        ]);
        
        $property = new Property();
        $property->property = $request->input("property");
        $property->area_id = $request->input("area_id");
        $property->area_phase_id = $request->input("area_phase_id");
        $property->reference_name = $request->input("client_name");
        $property->agency_name = $request->input("agency_name");
        $property->item_condition = $request->input("item_condition");
        $property->item_status = $request->input("item_status");
        $property->size = $request->input("size");
        $property->size_unit = $request->input("size_unit");
        $property->extra_land = $request->input("extra_land");
        $property->orientation = $request->input("orientation");
        $property->sector = $request->input("sector");
        $property->street_number = $request->input("street_number");
        $property->house_number = $request->input("house_number");
        $property->plot_number = $request->input("plot_number");
        $property->price = $request->input("price");
        $property->category =json_encode($request->input("category"));
        $property->reference_mobile = $request->input("client_mobile");
        $property->user_id = Auth::user()->id;

        $property->save();
        return redirect(url("/admin/inventory"))->with("success", "Inventory created successfully");
    }

    public function edit($property_id)
    {
        $property = Property::findOrFail($property_id);

        $areas = Area::all();
        $properties = Property::PROPERTY_EXTRAS["properties"];
        $item_statuses = Property::PROPERTY_EXTRAS["item_statuses"];
        $plot_types = Property::PROPERTY_EXTRAS["plot_types"];
        $statuses = Property::PROPERTY_EXTRAS["statuses"];
        $size_units = Property::PROPERTY_EXTRAS["size_units"];
        $user_types = Property::PROPERTY_EXTRAS["user_types"];
        $orientations = Property::PROPERTY_EXTRAS["orientations"];
        $categories = Property::PROPERTY_EXTRAS["categories"];
        $item_conditions = Property::PROPERTY_EXTRAS["item_conditions"];
        $purchase_statuses = Property::PROPERTY_EXTRAS["purchase_statuses"];

        return view('admin.inventory.update', compact('property', 'areas', 'item_conditions', 'purchase_statuses', 'properties', 'item_statuses', 'plot_types', 'statuses', 'size_units', 'user_types', 'orientations', 'categories'));
    }

    public function update(Request $request, $property_id)
    {
        // dd($request->all());
        $property = Property::findOrFail($property_id);
        $request->validate([
            'property' => ['required', Rule::in(Property::PROPERTY_EXTRAS['properties'])],
            'area_id' => 'required|exists:areas,id',
            'area_phase_id' => 'required|exists:area_phases,id',
            'client_name' => 'required|string|min:2|max:100',
            'agency_name' => 'required|string|min:2|max:100',
            'item_condition' => 'required|string|min:2|max:100',
            'item_status' => ['required', Rule::in(Property::PROPERTY_EXTRAS['item_statuses'])],
            'size' => 'required',
            'size_unit' => ['required', Rule::in(Property::PROPERTY_EXTRAS['size_units'])],
            'extra_land' => 'nullable',
            'orientation' => ['required', Rule::in(Property::PROPERTY_EXTRAS['orientations'])],
            'sector' => 'required',
            'street_number' => 'required',
            'price' => 'required',
            // 'category' => ['required', Rule::in(Property::PROPERTY_EXTRAS['categories'])],
            'category' => 'required|array',
            'reference_mobile' => 'nullable|size:11',
        ]);
        
        $property->property = $request->input("property");
        $property->area_id = $request->input("area_id");
        $property->area_phase_id = $request->input("area_phase_id");
        $property->reference_name = $request->input("client_name");
        $property->agency_name = $request->input("agency_name");
        $property->item_condition = $request->input("item_condition");
        $property->item_status = $request->input("item_status");
        $property->size = $request->input("size");
        $property->size_unit = $request->input("size_unit");
        $property->extra_land = $request->input("extra_land");
        $property->orientation = $request->input("orientation");
        $property->sector = $request->input("sector");
        $property->street_number = $request->input("street_number");
        $property->price = $request->input("price");
        $property->category = $request->input("category");
        $property->reference_mobile = $request->input("client_mobile");

        $property->save();
        
        return redirect(url("/admin/inventory"))->with("success", "Inventory updated successfully");
    }

    public function destroy($property)
    {
        $property = Property::findOrFail($property);
        $property->delete();

        return redirect(url("/admin/inventory"))->with("success", "Inventory deleted successfully");
    }

    public function updateStatus(Request $request, $inventory_id)
    {
        $request->validate([
            "status" => ['required', Rule::in(Property::PROPERTY_EXTRAS['purchase_statuses'])]
        ]);
        $inventory = Property::findOrFail($inventory_id);
        $inventory->purchase_status = $request->input("status");
        $inventory->save();
        return back()->with("success", "Status updated successfully");
    }

  
    public function inventory_detail($id)
    {
        $area = Area::all();
        dd('hehehe');
        $property = Property::find($id);

        return view('admin.inventory.details_inventory', ["properties" => $property, "area" => $area]);
    }

    public function export($id) 
    {
        
        $user = DB::table('users')
                ->join('properties', 'users.id', '=', 'properties.user_id')
                ->join('areas', 'properties.id', '=', 'areas.id')
                ->join('area_phases', 'properties.id', '=', 'area_phases.id')
                ->where('users.id', $id)
                ->select('users.*', 'properties.*', 'areas.name as name', 'area_phases.title as title')
                ->first();
                
        if (!$user) {
            return redirect()->back()->with("error", "No Record Found");
        }
        
        $user_data[] = [
            'ID' => $user->id,
            'Property' => $user->property,
            'Item Status' => $user->item_status,
            'Area' => $user->name,
            'Phase' => $user->title,
            'Street Number' => $user->street_number,
            'House Number' => $user->house_number,
            'Plot Number' => $user->plot_number,
            'Sector' => $user->sector,
            'Size' => $user->size,
            'Size Unit' => $user->size_unit,
            'Price' => $user->price,
            'Orientation' => $user->orientation,
            'Category' => $user->category,
            'Extra Land' => $user->extra_land,
            'Item Condition' => $user->item_condition,
            'Agency Name' => $user->agency_name,
            'Refrence Name' => $user->reference_name,
            'Refrence Mobile' => $user->reference_mobile,
            'Plot Type' => $user->plot_type,
            'Purchase Status' => $user->purchase_status,
            
        ];

        return Excel::download(new PropertyExport($user_data), 'user-data.xlsx');
    }
    public function export_all() 
    {
        return Excel::download(new UsersExport, 'data.xlsx');
    }
    
  
}
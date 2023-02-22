<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\AreaPhase;
use App\Models\Property;
use App\Models\User;
use Auth;
use DB;
use Hash;
use Illuminate\Http\Request;
use Storage;
use Str;
use View;

class AreaController extends Controller
{
    public function index(Request $request)
    {
        $areas = Area::all();
        return view('admin.areas.index', compact('areas'));
    }

    public function create()
    {
        return view('admin.areas.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:100',
            'phases' => 'required|array'
        ]);

        $name = $request->input("name");
        $phases = $request->input("phases");

        $area = new Area();
        $area->name = $name;
        $area->save();

        foreach ($phases as $phase) {
            AreaPhase::create([
                'area_id' => $area->id,
                'title' => $phase
            ]);
        }

        return redirect(url("/admin/areas"))->with("success", "Area created successfully");
    }
    public function edit($area_id)
    {
        $area = Area::findOrFail($area_id);
        return view('admin.areas.update', ["area" => $area]);
    }
    public function update(Request $request, $area_id)
    {
        
        // dd($request->all());
        $phase_countno=0;
        $phaseid_countno=0;
        $request->validate([
            'name' => 'required|string|min:2|max:100',
            'phases' => 'required|array'
        ]);

        $name = $request->input("name");
        $phases = $request->input("phases");

        // $area = Area::findOrFail($area_id);
        // $area->name = $name;
        // $area->save();

        // AreaPhase::where("area_id", $area->id)->first();
        
        foreach ($request->phases_id as $key => $node){
            $c = AreaPhase::find($node);
            if($c->title != $request->phases[$key]){
                // dd("success");
                $c->title = $request->phases[$key];
                $c->save();
                
            }
            
        }
        
        foreach($request->phases as $phases_count){
            $phase_countno++;
        // $phaseid_countno=0;
        }
        
        foreach($request->phases_id as $phases_count){
            // $phase_countno=0;
            $phaseid_countno++;
        }
        
        if($phase_countno > $phaseid_countno){
            
            
            for($j = $phaseid_countno+1 ; $j <= $phase_countno; $j++){
                AreaPhase::create([
                    'area_id' => $area_id,
                    'title' => $request->phases[$j-1]
                ]);
            }
        }
        
        // dd($phase_countno, $phaseid_countno);
        // dd("stop");
        
        // foreach ($phases as $phase) {
        //     AreaPhase::create([
        //         'area_id' => $area->id,
        //         'title' => $phase
        //     ]);
        // }

        return redirect(url("/admin/areas"))->with("success", "Area updated successfully");
    }

    public function destroy($area_id)
    {
        $area = Area::findOrFail($area_id);
        AreaPhase::where("area_id", $area->id)->delete();
        $area->delete();
        return redirect(url("/admin/areas"))->with("success", "User deleted successfully");
    }
    
    public function get_phases(Request $request){
        // dd($request->all());
         $phases = AreaPhase::where('area_id',$request->area_id)->get();
        $product_page = View::make('ajax_phase', compact('phases'))->render();
        return $product_page;
    }
}
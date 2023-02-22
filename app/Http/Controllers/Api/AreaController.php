<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Property;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AreaController extends BaseController
{
    public function extras()
    {
        return $this->sendSuccessResponse(Property::PROPERTY_EXTRAS);
    }
    public function add(Request $req)
    {
        $req->validate([
            'name' => 'required',
        ]);
        $Area = new Area();
        $Area->name = $req->name;
        $Area->save();
        return new JsonResponse($Area);
    }

    public function show()
    {
        $Area = Area::all();
                return $this->sendSuccessResponse($Area->jsonSerialize());

    }
    function delete($id)
    {
        $data = Area::find($id);
        $data->delete();
        return new JsonResponse();
    }
    function update(Request $req)
    {
        $Area = Area::find($req->id);
        $Area->name = $req->name;
        $Area->save();
        return new JsonResponse($Area);
    }
}
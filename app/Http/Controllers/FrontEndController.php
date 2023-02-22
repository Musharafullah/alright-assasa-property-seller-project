<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function Activitiess()
    {
        return view("admin.users.activities");
    }

}

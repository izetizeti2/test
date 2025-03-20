<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BloodGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BloodController extends Controller
{
  
    public function index()
    {
   
        $bloodGroups = BloodGroup::all();
        return response()->json($bloodGroups);
    }


    public function show($id)
    {
      
        $bloodGroup = BloodGroup::find($id);

       
        if (!$bloodGroup) {
            return response()->json(['message' => 'Blood group not found'], 404);
        }

        
        return response()->json($bloodGroup);
    }
}

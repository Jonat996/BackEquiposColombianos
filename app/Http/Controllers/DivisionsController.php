<?php

namespace App\Http\Controllers;

use App\Models\Divisions;
use Illuminate\Http\Request;

class DivisionsController extends Controller
{
    //
    public function index()
    {
        return Divisions::get();
    }

    public function store(Request $request)
    {

        $division = Divisions::create($request->all());
        return response()->json([
            'message' => 'Successfully created division!',
            'division' => $division
        ], 201);
    }
}

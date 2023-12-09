<?php

namespace App\Http\Controllers;

use App\Models\Krs;
use App\Models\User;
use Illuminate\Http\Request;

class KRSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $krs = Krs::where('id', auth()->user()->id)->get();

        return response()->json(
        [
            'status' => 'success', 
            'data' => $krs
        ], 
            200,
            ['application/json']
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Krs $krs)
    {
        

    }

    public function userKrs() {

        // if(auth()->user()->is_admin){
        //     $krs = Krs::all();
        // }else {
            $krs = Krs::with('user', 'subject')->where('user_id', auth()->user()->id)->get();
        // }


        return response()->json(
        [
            'message' => 'success', 
            'data' => $krs
        ], 
            200,
            ['Content-Type' => 'application/json']
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Krs $kRS)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Krs $kRS)
    {
        //
    }
}

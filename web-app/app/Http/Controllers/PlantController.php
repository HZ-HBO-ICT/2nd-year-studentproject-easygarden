<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Http\Request;

class PlantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return 'Data set created!';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Plant $plant
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        /**
         * TO DO: Validate requests to not be NULL
         */
        $plants_obj = Plant::where('token', $request['token'])->take(1)->get()[0];

        return $plants_obj->plant[$request['plant']];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Plant $plant
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        /**
         * TO DO: Validate requests to not be NULL
         */
        $validated_data = $request->validate([
            'token' => 'required',
            'plant' => 'required',
            'water' => 'numeric',
            'nutrition' => 'numeric',
            'light' => 'numeric'
        ]);


        $plants_obj = Plant::where('token', $request['token'])->first();

        // Indirect modifcation of overload element error fix: https://laracasts.com/discuss/channels/eloquent/indirect-modification-of-overloaded-element
        $plant = $plants_obj->plant;

        if ($request->has('water')) {
            $plant[$request['plant']]['water'] = $request['water'];
        }

        if ($request->has('nutrition')) {
            $plant[$request['plant']]['nutrition'] = $request['nutrition'];
        }

        if ($request->has('light')) {
            $plant[$request['plant']]['light'] = $request['light'];
        }

        $plants_obj->plant = $plant;

        return $plants_obj->save();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Plant $plant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plant $plant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Plant $plant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plant $plant)
    {
        //
    }
}

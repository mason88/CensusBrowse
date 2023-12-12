<?php

namespace App\Http\Controllers;

use App\Models\Census;
use Illuminate\Http\Request;

class CensusController extends Controller
{
    /**
     * Get data from Census API and store in local DB
     */
    public function populate(Request $request)
    {
        $censusData = Census::populate();

        return redirect('/census');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $censusData = Census::all();

        return view('census', ['censusData' => $censusData]);
    }
}

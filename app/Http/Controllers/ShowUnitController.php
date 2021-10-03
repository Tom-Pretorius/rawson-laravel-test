<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Api\AoeRestAPI;

class ShowUnitController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        #Get aoe units from API
        $aoeApi = new AoeRestAPI();
        $unit = $aoeApi->get('unit/' . $id);
        return view('unit')->with('unit', $unit);
    }
}

<?php

namespace App\Http\Controllers;

use App\Utilities\ArrayPaginator;
use App\Api\AoeRestAPI;
use App\Http\Requests\UnitsFilterRequest;
use Illuminate\Support\Facades\Cache;

class ShowUnitsController extends Controller
{
    /**
     * Incoming units filter request
     *
     * @param  \App\Http\Requests\UnitsFilterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UnitsFilterRequest $request, ArrayPaginator $paginator)
    {

        #Default var values
        $sort = 'name';
        $sortByAsc = 1;
        $perPage = 10;
        $cachingTime = 30; //Seconds

        #Get filter data from request
        if ($request->has('sort')) {
            $sort = $request->sort;
        }
        if ($request->has('sortByAsc') && $request->sortByAsc == 'desc') {
            $sortByAsc = 0;
        }
        if ($request->has('perPage')) {
            $perPage = $request->perPage;
        }

        #Get aoe units from API - Check chache first
        $units = Cache::get('units');
        if (!$units) {
            $aoeApi = new AoeRestAPI();
            $units = collect($aoeApi->get('units')->units);
            Cache::put('units', $units, $cachingTime);
        }

        #Sort
        if ($sortByAsc) {
            #Ascending
            $units = $units->sortBy($sort);
        } else {
            #Descending
            $units = $units->sortByDesc($sort);
        }

        #Paginate results
        $units = $paginator->paginate($units, $perPage);

        #Persist filters
        $params = array('sort' => $sort, 'sortByAsc' => $sortByAsc, 'perPage' => $perPage);

        return view('units')->with('units', $units)->with('params', $params);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules\RecordHelper;
use App\Modules\JSONResponseFormater;
use Illuminate\Validation\Validator;
use App\Country;
use App\User;

class CountriesController extends Controller
{

    use RecordHelper, JSONResponseFormater;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::with('users')->with('updated_user')->get([
            'country_id','country_name','country_name_native','country_code',
            'country_short_code','created_by','updated_by','enable_status as enable'
        ]);

        foreach($countries as $key => $country){
            $countries[$key]['created_by'] = $country->users['name'];
            $countries[$key]['updated_by'] = $country->updated_user['name'];
            unset($countries[$key]['users']);
            unset($countries[$key]['updated_user']);
        }

        return response()->json($countries);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new Country();

        $data = $model->getFillable();
        $data = $request->only($data);

        $data['created_by'] = \Auth::Guard('api')->user()->id;
        $data['updated_by'] = \Auth::Guard('api')->user()->id;

        $data['created_at'] = date('Y-m-d H:i:s');

        $rules = array(
            'country_name' => 'required|unique:countries,country_name',
            'country_code' => 'required',
            'country_short_code' => 'required',
        );

        $isSaved = $this->SaveRecord(new Country, $data, $rules);

        return $isSaved;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countryData = Country::findOrFail($id);

        return response()->json($countryData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $data['updated_by'] = \Auth::Guard('api')->user()->id;

        $updated = Country::where('country_id',$id)->update($data);

        if($updated){
            return $this->index();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $this->deleteRecords(new Country, 'country_id', $id);

        return $this->index();

    }

    public function multipleDelete(Request $request)
    {

        $this->deleteRecords(new Country, 'country_id', $request->all());

        return $this->index();

    }
}

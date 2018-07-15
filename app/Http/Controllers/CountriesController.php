<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules\RecordHelper;
use App\Modules\JSONResponseFormater;
use Illuminate\Validation\Validator;
use App\Country;
use App\Province;
use App\City;
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
        $countries = Country::with('children')->get();

        foreach($countries as $key=>$country){
            $country['fields'] = array(
                'country_name' => array('label' => 'Country Name'),
                'country_code' => array('label' => 'Country Code'),
                'country_short_code' => array('label' => 'Country Short Code'),
                'action' => array(
                    'label' => '',
                    'class' => 'action-col text-center',
                    'name' => 'country_name',
                    'id' => 'country_id',
                    'status' => 'enable_status',
                    'label' => '',
                    'class' => 'action-col text-center',
                    'api' => 'api/countries'
                )

            );
            $provinces = Province::with('children')->where('country_id',$country['country_id'])->get();

            foreach($country['children'] as $v){
                $v['fields'] = array(
                    'province_name' => array('label' => 'Province Name'),
                    'province_code' => array('label' => 'Province Code'),
                    'province_short_code' => array('label' => 'Province Short Code'),
                    'action' => array('label' => '',
                        'class' => 'action-col text-center',
                        'name' => 'province_name',
                        'id' => 'province_id',
                        'label' => '',
                        'class' => 'action-col text-center',
                        'api' => 'api/provinces'
                    )
                );

                foreach($provinces as $province){
                    $cities = City::where('province_id',$v['province_id'])->get();
                    $v['children'] = $cities;

                    foreach($v['children'] as $c){
                        $c['fields'] = array(
                            'city_name' => array('label' => 'City Name'),
                            'city_code' => array('label' => 'City Code'),
                            'city_short_code' => array('label' => 'City Short Code'),
                            'action' => array('label' => '',
                                'class' => 'action-col text-center',
                                'name' => 'city_name',
                                'id' => 'city_id',
                                'label' => '',
                                'class' => 'action-col text-center',
                                'api' => 'api/cities'
                            )
                        );
                    }
                }
            }



        }

//        $countries['provinces']=Province::all();

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

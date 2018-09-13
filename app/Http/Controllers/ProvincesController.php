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
use App\Http\Controllers\CountriesController;

class ProvincesController extends Controller
{

    use RecordHelper, JSONResponseFormater;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $filter = $request->all();

        dd($filter);

        foreach($filter as $key=>$val){
            if($val==='' or $val===null){
                unset($filter[$key]);
            }
        }

//        dd($filter);

        $provinces = Province::where($filter)->get(['province_id','province_name','province_code','province_short_code','created_at','updated_at']);

        foreach($provinces as $key=>$province) {
            $province['fields'] = array(
                'select_all' => array('label' => "", 'class' => "select-all-col"),
                'province_name' => array('label' => 'Province Name'),
                'province_code' => array('label' => 'Province Code'),
                'province_short_code' => array('label' => 'Province Short Code'),
                'action' => array('label' => '',
                    'class' => 'action-col text-center',
                    'name' => 'province_name',
                    'id' => 'province_id',
                    'label' => '',
                    'class' => 'action-col text-center',
                    'children' => true,
                    'api' => '/api/cities',
                    'formControls' => array('city_name', 'city_code', 'city_short_code')
                )
            );

            $cities = City::where('province_id',$province['province_id'])->get();

            $v['children'] = $cities;

            foreach($province['children'] as $c){
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
                        'children' => false,
                        'api' => '/api/cities',
                        'formControls' => array('city_name', 'city_code', 'city_short_code')
                    )
                );
            }

        }

        return response()->json($provinces);
    }

    public function provinceFilter(Request $request)
    {
        $filter = $request->all();

//        dd($filter);

        foreach($filter as $key=>$val){
            if($val==='' or $val===null){
                unset($filter[$key]);
            }

        }

//        dd($filter);

        $provinces = Province::where($filter)->get(['province_id','province_name','province_code','province_short_code','created_at','updated_at']);

        foreach($provinces as $key=>$province) {
            $province['fields'] = array(
                'select_all' => array('label' => "", 'class' => "select-all-col"),
                'province_name' => array('label' => 'Province Name'),
                'province_code' => array('label' => 'Province Code'),
                'province_short_code' => array('label' => 'Province Short Code'),
                'action' => array('label' => '',
                    'class' => 'action-col text-center',
                    'name' => 'province_name',
                    'id' => 'province_id',
                    'label' => '',
                    'class' => 'action-col text-center',
                    'children' => true,
                    'api' => '/api/cities',
                    'formControls' => array('city_name', 'city_code', 'city_short_code')
                )
            );

            $cities = City::where('province_id',$province['province_id'])->get();

            $v['children'] = $cities;

            foreach($province['children'] as $c){
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
                        'children' => false,
                        'api' => '/api/cities',
                        'formControls' => array('city_name', 'city_code', 'city_short_code')
                    )
                );
            }

        }

        return response()->json($provinces);
    }

    public function getCountries()
    {
        $countries = Country::all(['country_name as text', 'country_id as value']);

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

        $model = new Province();
        $request['country_id'] = $request->pid;
        $data = $model->getFillable();
        $data = $request->only($data);

        $data['created_by'] = \Auth::Guard('api')->user()->id;
        $data['updated_by'] = \Auth::Guard('api')->user()->id;
        $data['enable_status'] = 1;

        $data['created_at'] = date('Y-m-d H:i:s');

        $rules = array(
            'province_name' => 'required|unique:provinces,province_name',
            'province_code' => 'required',
            'province_short_code' => 'required',
        );

        $isSaved = $this->SaveRecord(new Province, $data, $rules);

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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $this->deleteRecords(new City, 'province_id', $id);
        $this->deleteRecords(new Province, 'province_id', $id);

        return $this->index();
    }
}

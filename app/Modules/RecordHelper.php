<?php

namespace App\Modules;
use Illuminate\Validation\Validator;

trait RecordHelper{

    public function SaveRecord($model, $data, $rules = array())
    {

            $validate = \Validator::make($data,$rules);

            if($validate->fails()){
                return response()->json(['errors'=>$validate->errors()],422);
            }

            $id = $model::insertGetId($data);
            return $id;
    }

}
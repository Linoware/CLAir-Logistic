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

    public function deleteRecords($model, $field, $id)
    {
        if(is_array($id)){
            foreach($id as $item){
                $model::where($field,$item[$field])->delete();
            }
        }else{
            $deleted = $model::where($field,$id)->delete();
        }

        return true;
    }

}
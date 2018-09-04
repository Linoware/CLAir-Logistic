<?php

  namespace App\Modules;

  trait JSONResponseFormater{

    public function ressponseJson($success,$payload = array()){

      $message = $success ? 'Transaction completed successfully' : 'Transaction failed';
      $status = $success ? true : false;
      $error_code = $success ? 0 : 1;
      $error_message = $success ? '' : 'Failed to save record to database';

      $data['message'] = $message;
      $data['status'] = $status;

      $data['payload'] = $payload;

      $data['errors'][] = array('error_code' => $error_code, 'error_message' => $error_message);

      return response()->json($data);

    }

    public function responseJsonDataTable($datas, $fields, $children = false, $field_name = 'name', $data_id = 'id')
    {

        $data_fields['select_all'] = array('label' => "", 'class' => "select-all-col");
        foreach($fields as $key=>$value){
            $data_fields[$key] = $value;

        }

        $data_fields['action'] = array(
            'label' => '',
            'class' => 'action-col text-center',
            'name' => $field_name,
            'id' => $data_id,
            'label' => '',
            'class' => 'action-col text-center',
            'children' => $children
        );

        foreach ($datas as $key => $data) {

            $data['fields'] = $data_fields;

        }
    }
  }

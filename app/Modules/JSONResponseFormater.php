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
    
  }

?>

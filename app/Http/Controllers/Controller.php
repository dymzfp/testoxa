<?php

namespace App\Http\Controllers;

use Validator;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function toSuccessJSON($message, $data = null) {
    	$json['status'] = 'ok';
    	$json['type'] = 'success';
    	$json['message'] = $message;
    	$json['data'] = $data;

    	return response()->json($json);
    } 

    public function toErrorsJSON(\Exception $e) {
    	$json['status'] = 'errors';
    	$json['type'] = 'danger';
    	$json['message'] = $e->getMessage();

        return response()->json($json);
    }

    public function withValidator($data, $rules, $message = []) {
    	$validator = Validator::make($data, $rules, $message);
    	if($validator->fails()) {
    		throw new \Exception(implode("<br />", $validator->messages()->all()), 500);
    	}
    }

    public function throwException($message) {
        throw new \Exception($message, 500);
    }

    public function throwInvalidData() {
        $this->throwException('Data tidak ada');
    }
}

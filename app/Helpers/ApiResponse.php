<?php 

namespace App\Helpers;

class ApiResponse {

	static public function errorResponse($status,$message)
	{
    	return response()->json([
    		'status' => $status,
    		'message' => $message
    	],$status)->header('Access-Control-Allow-Origin' , '*')
                  ->header('Access-Control-Allow-Methods', 'HEAD, GET, POST, PUT, PATCH, DELETE, OPTIONS');
	}

	static public function successResponse($data=array())
	{
    	return response()->json([
    		'status' => 200,
    		'data' => $data
    	],200);  
	}
	
}
<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\SchoolMaster;
use App\Helpers\ApiResponse;
use Validator;

class HomeController extends Controller
{
    public function getIndex(){
    	$viewData   =   [
            'pageTitle'      => "Eclass | Admin",
            'pageIdentifier' => 'home',
        ];
        return view('admin.index',$viewData);
    }
    public function getSchoolMaster(){
 		$viewData   =   [
            'pageTitle'      => "Eclass | Admin | New Class",
            'pageIdentifier' => 'home',
        ];
        return view('admin.school-master',$viewData);
    }
      // New School Master Creation 
    public function postCreate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'school_name'     => 'required|max:50',
            'school_address'  => 'required|max:100',
            'contact_no'      => 'required|integer',
            'no_of_credit'    => 'required',
        ]);

        if ($validator->fails()) {
            return ApiResponse::errorResponse('400', $validator->messages());
        }

        $serviceMaster = SchoolMaster::create([
                                        'school_name'     => $request->school_name,
                                        'school_address'  => $request->school_address,
                                        'contact_no'      => $request->contact_no,
                                        'no_of_credit'    => $request->no_of_credit,
                                    ]);        
        $responseContent = [
                                "message" => "School Master Created Successfully"
                            ];
        return ApiResponse::successResponse($responseContent);
    }

    //schoolMaster Updated in Database
    public function putUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id'              => 'required|exists:school_masters,id',
            'school_name'     => 'required|max:50',
            'school_address'  => 'required|max:100',
            'contact_no'      => 'required|integer',
            'no_of_credit'    => 'required',        
        ]);

        if ($validator->fails()) {
            return ApiResponse::errorResponse('400', $validator->messages());
        }
        $schoolMaster = SchoolMaster::find($request->id);
        $schoolMaster->update([
                                'school_name'     => $request->school_name,
                                'school_address'  => $request->school_address,
                                'contact_no'      => $request->contact_no,
                                'no_of_credit'    => $request->no_of_credit,
                            ]);  
        $responseContent = [
                                "message" => "School Master updated Successfully"
                            ];
        return ApiResponse::successResponse($responseContent);
    }

    // schoolMaster Deleted in Database.
    public function postDelete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|numeric|exists:school_masters,id',
        ]);

        if ($validator->fails()) {
            return ApiResponse::errorResponse('400', $validator->messages());
        }

        $schoolMasterId = $request->id;
        SchoolMaster::find($schoolMasterId)->delete();

        $responseContent = [
                                "message" => "School Master Deleted Successfully"
                            ];
        return ApiResponse::successResponse($responseContent);
    }

    // schoolMaster List Json  Getting.
    public function getList(Request $request)
    {
        $schoolMaster = SchoolMaster::all();
        $responseContent = [
                                "schoolMaster" => $schoolMaster,
                           ];
        return ApiResponse::successResponse($responseContent);
    }

    // serviceMaster Detail Get corresponding Id.
    // public function getDetails($id)
    // {
    //     $validator = Validator::make(['id' => $id], [
    //         'id' => 'required|exists:service_masters,id',
    //     ]);

    //     if ($validator->fails()) {
    //         return ApiResponse::errorResponse('400', $validator->messages());
    //     }

    //     $serviceMaster = ServiceMaster::whereId($id)->first();
                                  
    //     $responseContent = [
    //                             "serviceMaster" => $serviceMaster,
    //                         ];
    //     return ApiResponse::successResponse($responseContent);
    // }
}

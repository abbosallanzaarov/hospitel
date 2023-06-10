<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\IHosptalRepository;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelpers;
use Illuminate\Support\Facades\Validator;

class HospitalController extends Controller
{
    use ResponseHelpers;
    public function __construct (protected IHosptalRepository $HospitalRepository)
    {

    }
    public function index()
    {
        $data = $this->HospitalRepository->getAllHospital();
        if(count($data) > 0){
            return $this->jsonResponse( $data , 200 , 'success' );
        }else{
            return $this->jsonResponse(null , 204 , 'not found');
        }
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'admin_id'=> 'numeric',
            "name" => 'required|string',
            'region'=> 'required|string',
            'district' => 'required|string',
            'street' => 'required|string',
            'image' => 'required|string'
        ]);
        if ($validator->fails()) {
            return $this->jsonResponse($validator->errors() , 422 , 'validator errors');
        }

        $add = $this->HospitalRepository->create($request->all());
        if($add){
            return $this->jsonResponse($add , 201 , 'success');
        }
    }
    public function update(Request $request , int $id)
    {
        $this->HospitalRepository->update($request->all() , $id);
        return $this->jsonResponse('update success' , 200 , 'success');
    }
    public function destroy($id)
    {
        $this->HospitalRepository->delete($id);
        return $this->jsonResponse('success delete' , 204 , 'success');
    }

}

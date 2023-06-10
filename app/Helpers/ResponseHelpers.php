<?php



namespace App\Helpers;


trait ResponseHelpers {
    protected function jsonResponse($data , $statusCode , $msg)
    {
        return response()->json([
            'msg' => $msg,
            'data' => $data
        ], $statusCode);
    }
    
}


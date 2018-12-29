<?php

namespace App\Http\Controllers\API\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    protected $isWebPageReq = false;
    /**
     * succes response on actions
     *
     * @param $result
     * @param $messge
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendResponse($result, $message)
    {
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];


        return response()->json($response, 200);
    }

    /**
     * error response on actions
     *
     * @param $error
     * @param array $errorMessages
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];
        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }

    protected function isWebSiteRwquest(Request $request, $apiToken){

        $this->isWebPageReq =  $request->_token?? false;
        if($this->isWebPageReq){
            setcookie("user_api_token", $apiToken->accessToken);
        }

    }
//{
//"name": "IgorPal",
//"email": "ipalinchak@yahoo.com",
//"password": "111111"
//
//}
}

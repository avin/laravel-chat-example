<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Generates result response object
     *
     * @param mixed  $data
     * @param string $message
     *
     * @return array
     */
    protected static function makeApiResult($data, $message)
    {
        $result = array();
        $result['flag'] = true;
        $result['message'] = $message;
        $result['data'] = $data;
        return $result;
    }

    /**
     * Generates error response object
     *
     * @param int    $errorCode
     * @param string $message
     * @param mixed  $data
     *
     * @return array
     */
    protected static function makeApiError($errorCode, $message, $data = array())
    {
        $error = array();
        $error['flag'] = false;
        $error['message'] = $message;
        $error['code'] = $errorCode;
        if(!empty($data))
            $error['data'] = $data;
        return $error;
    }
}

<?php

namespace App\Http\Services\General;

use App\Components\CustomStatusCodes;
use App\Contracts\AbstractFilms;

class GeneralResponseService implements GeneralResponseServiceInterface
{


    public static function generateResponse($body, $code, $message ,$http_code)
    {


        $header['code'] = $code;
        $header['message'] = $message;

        $data = array(
            'header' => $header,
            'body' => $body
        );
        return response($data,$http_code);
    }

    public static function successResponseFetch(array $body)
    {
        $code= CustomStatusCodes::HTTP_SUCCESS_CODE;
        $message=CustomStatusCodes::SUCCESS_GENERAL_MESSAGE;
        $http_code=CustomStatusCodes::HTTP_SUCCESS_CODE;
        
        return self::responseGenerator($body,$code,$message,$http_code,true);

    }

    public static function successResponseCreated($body)
    {
        $code= CustomStatusCodes::HTTP_SUCCESS_CODE;
        $message=CustomStatusCodes::SUCCESS_CREATED;
        $http_code=CustomStatusCodes::HTTP_INSERTED_SUCCESS_CODE;
        
        return self::responseGenerator($body,$code,$message,$http_code,true);

    }

    public static function responseGenerator($body, $code, $message ,$http_code,$status=true)
    {
        $header['code'] = $code;
        $header['message'] = $message;
        $header['success'] = $status;
        $data = array(
            'header' => $header,
            'body' => $body
        );
        return response($data,$http_code);
    }

    

}
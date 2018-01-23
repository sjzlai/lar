<?php

/**
 * @param int $status
 * @param $message
 * @param null $data
 * @return \Illuminate\Http\JsonResponse
 * @name 返回json格式
 * @author weikai
 */
    function show($status=1,$message,$data=null){
        $res = [
            'status' =>$status,
            'message' =>$message,
            'data' =>$data
        ];
        return response()
            ->json($res);
    }
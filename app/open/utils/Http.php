<?php 
namespace app\open\utils;


class Http{

    /**
     * API成功响应
     * @param $status 业务状态码
     * @param string $message 响应状态说明
     * @param array $data 响应数据集
     * @param int $httpStatus http状态码
     * @return \think\response\Json
     */
    public static function success($message = '访问成功',$data = [], $status = 1, $httpStatus = 200){
        $result = [
            "status" => $status,
            "message" => $message,
            "result" => $data,
        ];
        return json($result, $httpStatus);
    }

    /**
     * API失败响应
     * @param $status 业务状态码
     * @param string $message 响应状态说明
     * @param int $httpStatus http状态码
     * @return \think\response\Json
     */
    public static function error($message = '访问错误',$status = 0, $httpStatus = 500){
        $result = [
            "status" => $status,
            "message" => $message,
        ];
        return json($result, $httpStatus);
    }
}

 ?>
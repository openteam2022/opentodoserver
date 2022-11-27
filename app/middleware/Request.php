<?php 
namespace app\middleware;
use app\open\utils\Http;
class Request {
    /*过滤token*/
    public function handle ($request,\Closure $next){
        $token = $request->header();
        if($token['token'] != 'openplan'){
            return Http::error("网络错误~请稍后重试");
        }else{
            return $next($request);
        }
    }
}


 ?>
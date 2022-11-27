<?php 
namespace app\controller;

use app\BaseController;
use think\Request;
use app\open\utils\Http;
use app\open\iron\Iron;

class Login extends BaseController{

    /**
     * loginLogic实例
    */
    protected $loginLogic;

    protected $data;

    protected $token;

    /**
     * 初始化控制器
    */
    public function __construct(Request $request){
        $this->data = $request->param();
        // 获取逻辑层实例
        $this->loginLogic = invoke('app\logic\Login');
    }
    /**
     * 用户登录
    */
    public function login(){
        $this->data['password'] = Iron::iron($this->data['password'],'item');
        $res = $this->loginLogic->getUser($this->data);
        if($res){
            return Http::success('登录成功',$res);
        }else{
            return Http::error("网络错误~请稍后重试");
        }

    }
    /**
     * 注册新用户
    */
     public function register(){
        $this->data['password'] = Iron::iron($this->data['password'],'item');
        $res = $this->loginLogic->addUser($this->data);
        if($res){
            $userData = invoke('app\controller\Data');
            $userData->add(['uid'=>$res['id']]);
            return Http::success('成功',$res);
        }else{
            return Http::error("网络错误~请稍后重试");
        }
    }
}















 ?>
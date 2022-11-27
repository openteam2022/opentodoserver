<?php 
namespace app\logic;


class Login{
    /**
     * AdminModel的实例
    */
    protected $loginModel;

    /**
     * 控制器初始化模型实例
    */
    public function __construct(){
        $this->loginModel = invoke('app\model\User');
    }
    /**
     * 用户注册
     * @param $data 用户提交的数据
    */
    public function addUser($data){
        $result = $this->loginModel->addUser($data);
        return $result;
    }

    /**
     * 获取用户信息
     * @param $data:array 用户名和用户密码
    */
    public function getUser($data){
        $result = $this->loginModel->getUser($data);
        if(!$result->isEmpty()){
            return $result;
        }else{
            return false;
        }
    }

    
}

 ?>
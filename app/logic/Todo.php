<?php 
namespace app\logic;

class Todo {
    /**
     * todoModel的实例
    */
    protected $todoModel;

    /**
     * 控制器初始化模型实例
    */
    public function __construct(){
        $this->todoModel = invoke('app\model\Todo');
    }

    /**
     * 添加todo
     * @param $data 用户提交的数据
    */
    public function addTodo($data){
        $result = $this->todoModel->addTodo($data);
        if(!$result){
            return false;
        }else{
            return $result;
        }
    }

     /**
     * 获取todo列表
     * @param $data 用户提交的数据
    */
    public function getTodoList($uid){
        $result = $this->todoModel->getTodoList($uid);
        if(!$result){
            return false;
        }else{
            return $result;
        }
    }

     /**
     * 获取todo历史
     * @param $data 用户提交的数据
    */
    public function getTodoHistory($uid){
        $result = $this->todoModel->getTodoHistory($uid);
        if(!$result){
            return false;
        }else{
            return $result;
        }
    }

    /**
     * 完成todo
     * @param $data 用户提交的数据
    */
    public function finishTodo($data){
        $result = $this->todoModel->finishTodo($data);
        if(!$result){
            return false;
        }else{
            return $result;
        }
    }

    /**
     * 软删除todo
     * @param $data 用户提交的数据
    */
    public function removeTodo($data){
        $result = $this->todoModel->removeTodo($data);
        if(!$result){
            return false;
        }else{
            return $result;
        }
    }
}


 ?>
<?php 
namespace app\logic;

class Task {

    protected $taskModel;


    /**
     * 初始化
    */
    public function __construct(){
        $this->taskModel = invoke('app\model\Task');
    }

    /**
     * 添加任务
    */
    public function addTask($data){
        $res = $this->taskModel->addTask($data);
        return $res;
    }

     /**
     * 获取任务
    */
    public function getTask($uid){
        $res = $this->taskModel->getTask($uid);
        if(!$res){
            return false;
        }else{
            return $res;
        }
    }

      /**
     * 完成子任务
    */
    public function finishTask($data){
        $res = $this->taskModel->finishTask($data);
        if(!$res){
            return false;
        }else{
            return $res;
        }
    }

      /**
     * 软删除任务
    */
    public function removeTask($data){
        $res = $this->taskModel->removeTask($data);
        if(!$res){
            return false;
        }else{
            return $res;
        }
    }
}


 ?>
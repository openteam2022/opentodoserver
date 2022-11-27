<?php 
namespace app\controller;
use app\BaseController;
use think\Request;
use app\open\utils\Http;

class Task extends BaseController{


    protected $data;


    /**
     * 控制器初始化
    */

    public function __construct(Request $request){
        $this->data = $request->param();

        $this->taskLogic = invoke('app\logic\Task');
    }



    /**
     * 添加任务
    */
    public function add(){
        $res = $this->taskLogic->addTask($this->data);
        if($res){
            return Http::success('成功',['id' => $res->id]);
        }else{
            return Http::error('失败');
        }
    }

    /**
     * 获取任务
    */
    public function get(){
        $res = $this->taskLogic->getTask($this->data['uid']);
        if($res){
            return Http::success('成功',$res);
        }else{
            return Http::error('失败');
        }
    }

     /**
     * 完成子任务
    */
    public function finish(){
        $res = $this->taskLogic->finishTask($this->data);
        if($res){
            return Http::success('成功',$res);
        }else{
            return Http::error('失败');
        }
    }

     /**
     * 软删除子任务
    */
    public function remove(){
        $res = $this->taskLogic->removeTask($this->data);
        if($res){
            return Http::success('成功',$res);
        }else{
            return Http::error('失败');
        }
    }
}

 ?>
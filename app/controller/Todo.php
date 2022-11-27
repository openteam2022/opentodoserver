<?php 
namespace app\controller;

use app\BaseController;
use think\Request;
use app\open\utils\Http;

class Todo extends BaseController{


    protected $data;
    protected $todoLogic;

    /**
     * 初始化
    */
    public function __construct(Request $request){
        $this->data = $request->param();

        $this->todoLogic = invoke('app\logic\Todo');
    }

    /**
     * 添加todo
    */
    public function add(){
        $res = $this->todoLogic->addTodo($this->data);
        if($res){
            return Http::success('添加成功',['id'=> $res->id]);
        }else{
            return Http::error('网络错误~');
        }
    }
    /**
     * 获取todo列表
    */
    public function get(){
        $res = $this->todoLogic->getTodoList($this->data['uid']);
        if($res){
            return Http::success("查询成功",$res);
        }else{
            return Http::error('网络错误~');
        }
    }

    /**
     * 获取todo历史记录
    */
    public function getHistory(){
        $res = $this->todoLogic->getTodoHistory($this->data['uid']);
        if($res){
            return Http::success("查询成功",$res);
        }else{
            return Http::error('网络错误~');
        }
    }

     /**
     * 完成todo
    */
    public function finish(){
        $res = $this->todoLogic->finishTodo($this->data);
        if($res){
            return Http::success("查询成功",$res);
        }else{
            return Http::error('网络错误~');
        }
    }

     /**
     * 软删除
    */
    public function remove(){
        $res = $this->todoLogic->removeTodo($this->data);
        if($res){
            return Http::success("查询成功",$res);
        }else{
            return Http::error('网络错误~');
        }
    }
}


 ?>
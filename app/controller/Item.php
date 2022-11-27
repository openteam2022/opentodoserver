<?php 
namespace app\controller;
use app\BaseController;
use think\Request;
use app\open\utils\Http;

class Item extends BaseController{


    protected $data;


    /**
     * 控制器初始化
    */

    public function __construct(Request $request){
        $this->data = $request->param();

        $this->itemLogic = invoke('app\logic\Item');
    }



    /**
     * 添加任务
    */
    public function add(){
        $res = $this->itemLogic->addItem($this->data);
        if($res){
            return Http::success('成功',['id'=>$res->id]);
        }else{
            return Http::error('失败');
        }
    }

    /**
     * 获取任务
    */
    public function get(){
        $res = $this->itemLogic->getItem($this->data['uid']);
        if($res){
            return Http::success('成功',$res);
        }else{
            return Http::error('失败');
        }
    }


    /**
     * 获取任务历史记录
    */
    public function getHistory(){
        $res = $this->itemLogic->getItemHistory($this->data['uid']);
        if($res){
            return Http::success('成功',$res);
        }else{
            return Http::error('失败');
        }
    }

    /**
     * 完成任务
    */
    public function finish(){
        $res = $this->itemLogic->finishItem($this->data);
        if($res){
            return Http::success('成功',$res);
        }else{
            return Http::error('失败');
        }
    }

    /**
     * 软删除
    */
    public function remove(){
        $res = $this->itemLogic->removeItem($this->data);
        if($res){
            return Http::success('成功',$res);
        }else{
            return Http::error('失败');
        }
    }
}

 ?>
<?php 
namespace app\controller;

use app\BaseController;
use think\Request;
use app\open\utils\Http;
use app\open\iron\Iron;

class Data extends BaseController{

    /**
     * loginLogic实例
    */
    protected $dataLogic;

    protected $data;


    /**
     * 初始化控制器
    */
    public function __construct(Request $request){
        $this->data = $request->param();
        // 获取逻辑层实例
        $this->dataLogic = invoke('app\logic\Data');
    }

    /**
     * 添加data
    */
    public function add($data){
        $res = $this->dataLogic->addData($data);
        if($res){
            return Http::success('成功',['id'=>$res['id']]);
        }else{
            return Http::error('失败');
        }
    }

    /**
     * 获取data
    */
    public function get(){
        $res = $this->dataLogic->getDatas($this->data);
        if($res){
            return Http::success('成功',$res);
        }else{
            return Http::error('失败');
        }
    }

    /**
     * 更新天数
    */
    public function updateDay(){
        $res = $this->dataLogic->updateDay($this->data);
        if($res){
            return Http::success('成功',['id'=>$res['id']]);
        }else{
            return Http::error('失败');
        }
    }

    /**
     * 更新完成次数
    */
    public function updateFinish(){
        $res = $this->dataLogic->updateFinish($this->data);
        if($res){
            return Http::success('成功',['id'=>$res->id]);
        }else{
            return Http::error('失败');
        }
    }

    /**
     * 更新记录次数
    */
    public function updateTotal(){
        $res = $this->dataLogic->updateTotal($this->data);
        if($res){
            return Http::success('成功',$res);
        }else{
            return Http::error('失败');
        }
    }

    /**
     * 更新最后添加时间
    */
    public function updateTime(){
        $res = $this->dataLogic->updateTime($this->data);
        if($res){
            return Http::success('成功',$res);
        }else{
            return Http::error('失败');
        }
    }
}















 ?>
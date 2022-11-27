<?php 
namespace app\logic;

class Item {

    protected $itemModel;


    /**
     * 初始化
    */
    public function __construct(){
        $this->itemModel = invoke('app\model\Item');
    }

    /**
     * 添加任务
    */
    public function addItem($data){
        $res = $this->itemModel->addItem($data);
        return $res;
    }

     /**
     * 获取任务
    */
    public function getItem($uid){
        $res = $this->itemModel->getItem($uid);
        $taskLogic = invoke('app\logic\Task');
        if(!$res){
            return false;
        }else{
            $data = [];
            for($i = 0;$i < count($res);$i ++) {
                $item = $res[$i];
                $taskRes = $taskLogic->getTask($item['id']);
                if($taskRes){
                    $item['child'] = $taskRes;
                }else{
                    $item['child'] = [];
                }

                array_push($data,$item);
            }
            return $data;
        }
    }

     /**
     * 获取任务
    */
    public function getItemHistory($uid){
        $res = $this->itemModel->getItemHistory($uid);
        if(!$res){
            return false;
        }else{
            return $res;
        }
    }

    /**
     * 完成任务
    */
    public function finishItem($data){
        $res = $this->itemModel->finishItem($data);
        return $res;
    }

    /**
     * 软删除
    */
    public function removeItem($data){
        $res = $this->itemModel->removeItem($data);
        return $res;
    }
}


 ?>
<?php 
namespace app\logic;

class Data {

    protected $dataModel;


    /**
     * 初始化
    */
    public function __construct(){
        $this->dataModel = invoke('app\model\Data');
    }

    /**
     * 添加数据
    */
    public function addData($data){
        $res = $this->dataModel->addData($data);
        return $res;
    }

    /**
     * 获取数据
    */
    public function getDatas($data){
        $res = $this->dataModel->getDatas($data);
        return $res;
    }

     /**
     * 更新累计天数
    */
    public function updateDay($data){
        $res = $this->dataModel->updateDay($data);
        return $res;
    }

     /**
     * 更新总记录
    */
    public function updateTotal($data){
        $res = $this->dataModel->updateTotal($data);
        return $res;
    }

     /**
     * 更新完成次数
    */
    public function updateFinish($data){
        $res = $this->dataModel->updateFinish($data);
        return $res;
    }

     /**
     * 更新最后完成时间
    */
    public function updateTime($data){
        $res = $this->dataModel->updateTime($data);
        return $res;
    }
}


 ?>
<?php 
namespace app\model;

use think\Model;

class Data extends Model{

    /**
    * 添加data
    * @param $data:array todo内容和类型
     */ 
     public function addData($data){
          $datas = new Data;
          $datas->save($data);
          return $datas;
     }

     /**
     * 获取data
     * @param $data:array data内容和类型
     */ 
     public function getDatas($data){
          return $this->where('uid',$data['uid'])->find();
     }

     /**
     * 更新天数
     * @param $data:array todo内容和类型
     */ 
     public function updateDay($data){
          if($data){
              return $this->where('uid',$data['uid'])->inc('add_day',1)->update();
          }
     }

     /**
     * 更新完成数
     * @param $data:array todo内容和类型
     */ 
     public function updateFinish($data){
          if($data){
              return $this->where('uid',$data['uid'])->inc('finish_number',1)->update();
          }
     }

     /**
     * 更新记录数
     * @param $data:array todo内容和类型
     */ 
     public function updateTotal($data){
          if($data){
              return $this->where('uid',$data['uid'])->inc('total_number',1)->update();
          }
     }

     /**
     * 更新最新记录日期
     * @param $data:array todo内容和类型
     */ 
     public function updateTime($data){
          if($data){
              return $this->where('uid',$data['uid'])->update(['last_time'=>$data['last_time']]);
          }
     }

}


 ?>
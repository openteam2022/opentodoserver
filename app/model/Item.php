<?php 
namespace app\model;

use think\Model;


class Item extends Model{

    /**
     * 添加任务
    */
    public function addItem($data){
        $item = new Item;
        $item->save($data);
        return $item;
    }


    /**
     * 获取任务
    */
    public function getItem($uid){
        return $this->where('uid',$uid)->where('status','<=',1)->order('create_time desc')->select();
    }

     /**
     * 获取任务历史记录
    */
    public function getItemHistory($uid){
        return $this->where('uid',$uid)->order('create_time desc')->select();
    }

     /**
     * 完成任务
    */
    public function finishItem($data){
        return $this->where(['uid'=>$data['uid'],'id'=>$data['id']])->update(['status'=> 1]);
    }

     /**
     * 软删除
    */
    public function removeItem($data){
        if($data['status'] == 0){
             return $this->where(['uid'=>$data['uid'],'id'=>$data['id']])->update(['status'=> 3]);
        }else{
            return $this->where(['uid'=>$data['uid'],'id'=>$data['id']])->update(['status'=> 2]);
        }
    }



}




 ?>
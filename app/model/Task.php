<?php 
namespace app\model;

use think\Model;


class Task extends Model{

    /**
     * 添加任务
    */
    public function addTask($data){
        $task = new Task;
        $task->save($data);
        return $task;
    }


    /**
     * 获取任务
    */
    public function getTask($id){
        return $this->where('item_id',$id)->where('status','<=',1)->order('create_time desc')->select();
    }

    /**
     * 完成子任务
    */
    public function finishTask($data){
        return $this->where(['id'=>$data['id'],'uid'=>$data['uid']])->update(['status'=>1]);
    }

    /**
     * 软删除
    */
    public function removeTask($data){
        if($data['status'] == 0){
            return $this->where(['id'=>$data['id'],'uid'=>$data['uid']])->update(['status'=>3]);
        }else{
            return $this->where(['id'=>$data['id'],'uid'=>$data['uid']])->update(['status'=>2]);
        }
    }



}




 ?>
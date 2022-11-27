<?php 
namespace app\model;

use think\Model;

class Todo extends Model{

    /**
    * 添加todo
    * @param $data:array todo内容和类型
     */ 
     public function addTodo($data){
          $todo = new Todo;
           $todo->save($data);
           return $todo;
     }

     /**
     * 获取todo列表
     * @param $data:array todo内容和类型
     */ 
     public function getTodoList($uid){
          return $this->where('uid',$uid)->where('status','<=',1)->order('create_time desc')->select();
     }

      /**
     * 获取todo历史
     * @param $data:array todo内容和类型
     */ 
     public function getTodoHistory($uid){
          return $this->where('uid',$uid)->order('create_time desc')->select();
     }

      /**
     * 完成todo
     * @param $data:array todo内容和类型
     */ 
     public function finishTodo($data){
          return $this->where(['uid'=>$data['uid'],'id'=>$data['id']])->update(['status'=>1]);
     }

      /**
     * 软删除todo
     * @param $data:array todo内容和类型
     */ 
     public function removeTodo($data){
          if($data['status'] == 0){
               return $this->where(['uid'=>$data['uid'],'id'=>$data['id']])->update(['status'=>3]);
          }else{
               return $this->where(['uid'=>$data['uid'],'id'=>$data['id']])->update(['status'=>2]);
          }
     }


}


 ?>
<?php
namespace app\model;

use think\Model;

class User extends Model{
   /**
    * 新用户注册
    * @param $data:array 增加的用户名和手机号,密码等
   */ 
   public function addUser($data){
        $user = new User;
        $user->save($data);
        return $user;
   }

   /**
     * 删除用户
     * @param $uid 用户id
    */
    public function deleteUser($uid){
        return User::destroy($uid);
    }

     /**
     * 查询用户信息
     * @param $data:array 用户名和用户密码
    */
    public function getUser($data){
        return User::where(['name'=>$data['name'],'password'=>$data['password']])->field('id,name,img')->findOrEmpty();
    }

    /**
     * 查询用户信息
     * @param $uid 管理员id
    */
    public function getOneAdmin($uid){
        return User::where('id',$uid)->findOrEmpty();
    }


}
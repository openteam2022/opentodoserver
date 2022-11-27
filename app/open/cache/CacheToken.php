<?php 
namespace app\open\cache;

use think\facade\Cache;

// token类

class CacheToken{

    // token默认缓存类型
    private $cacheType = 'redis';

    /**
     * 生成token
     * @param uid
     * @param value
     * @return token
     */
    private function createToken($uid,$value){
        return Cache::store($cacheType)->set($uid,$value);
    }

    /**
     * 获取token
     * @param uid
     * @return token
     */
    private function getToken($uid,$value){
        return Cache::store($cacheType)->get($uid);
    }

    /**
     * 删除缓存
     * @param uid
     */
    private function deleteToken($uid){
        Cache::delete($uid); 
    }

    /**
     * 设置管理员token
     * @param uid
     * @param value
     * @return token
     */ 
    public function setAdminToken($uid,$value){
        $token = $this->createToken($uid,$value);
        return $token;
    }

    /**
     * 获取管理员token
     * @param uid
     * @return token
     */
    public function getAdminToken($uid){
        $token = $this->getToken($uid);
        return $token;
    } 

    /**
     * 设置用户小程序token
     * @param uid
     * @param value
     * @return token
     */ 
    public function setUserWsrToken($uid,$value){
        $token = $this->createToken('wsr'. $uid,$value);
        return $token;
    }
    /**
     * 获取用户小程序token
     * @param uid
     * @return token
     */
    public function getUserWsrToken($uid){
        $token = $this->getToken('wsr'.$uid);
        return $token;
    } 

    /**
     * 设置用户apptoken
     * @param uid
     * @param value
     * @return token
     */ 
    public function setUserAppToken($uid,$value){
        $token = $this->createToken('app'. $uid,$value);
        return $token;
    }
    /**
     * 获取用户apptoken
     * @param uid
     * @return token
     */
    public function getUserAppToken($uid){
        $token = $this->getToken('app'.$uid);
        return $token;
    } 

}



 ?>
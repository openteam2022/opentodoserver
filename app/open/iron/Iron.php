<?php 
namespace app\open\iron;

class Iron {
    public static function iron($val,$text){
        return md5(md5($val).$text);
    }
}


 ?>
<?php 
namespace app\open\utils;

use app\BaseController;
use app\open\validate\ImageValidate;

/**
 * 图片上传
 */
Class UploadImage{
    /**
     * 初始化request
     * @param $request 获取请求对象
     */
    public function __initialize(Request $request){
        $this->request = $request;
    }
    /**
     * 图片操作
     * @param $request:$this-request
    */
    public static function uploadImage($request,$dir){
        $file = $request->file('files');
        $isFile = validate(ImageValidate::class)->check(['file'=>$file]);
        if(true !== $isFile){
           return show(0,$isFile->getError(),[],500);
        }else{
            $savename = \think\facade\Filesystem::disk('public')->putFile( 'uploads/avatar', $file);
            if($savename){
                // 替换路径反斜杠
                $imgUrl = str_replace('\\', '/', $savename);
                return show_success('上传成功',$imgUrl,1);
            }else{
                return show_error('上传失败',0);
            }
        }
    }
}

 ?>
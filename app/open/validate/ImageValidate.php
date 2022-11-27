<?php 
namespace app\validate;
 
use think\Validate;
/**
 * 
 */
class ImageValidate extends Validate
{
    // 图片验证规则
    public $rule = [
        'file' => 'require|fileExt:png,jpeg,jpg|fileSize:200000000'
    ];
    // 图片验证规则信息
    public $message = [
        'file.require'=>'文件不能为空',
        'file.fileExt'=>'文件后缀只能是png,jpeg,jpg',
        'file,fileSize'=>'文件大小只是1M',
    ];
}


 ?>
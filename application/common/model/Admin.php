<?php

namespace app\common\model;

use houdunwang\crypt\Crypt;
use think\Model;

class Admin extends Model
{
    //主键
    protected $pk='admin_id';

    //设置当前模型对应的完整数据表名称
    protected $table='blog_admin';

    //登陆
    public function login($data)
    {
        //echo Crypt::encrypt('admin888');//加密h3vPU8JGuF3VS/uxIpjRSw==
        //解密
        echo Crypt::decrypt('h3vPU8JGuF3VS/uxIpjRSw== ');
        //验证

            $validate = Loader::validate('Admin');

            if(!$validate->check($data)){
                dump($validate->getError());
            }

        //比对用户名和密码
        //存入session
    }

}

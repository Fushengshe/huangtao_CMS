<?php

namespace app\common\model;

use houdunwang\crypt\Crypt;
use think\Loader;
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

        //验证
        $validate = Loader::validate('Admin');

            if(!$validate->check($data)){
                dump($validate->getError());
            }

        //比对用户名和密码

        $userInfo = $this->where('admin_id',session('admin.admin_id'))->where('admin_password',Crypt::encrypt($data['admin_password']))->find();
        if(!$userInfo)
        {
            return ['valid'=>0,'msg'=>'原始密码不正确'];
        }
        //存入session
    }

}

<?php

namespace app\admin\controller;

use houdunwang\crypt\Crypt;
use app\common\model\Admin;
use think\Controller;

class Login extends Controller
{
    public  function login()
    {

        //echo Crypt::encrypt('admin888');//加密h3vPU8JGuF3VS/uxIpjRSw==
        //解密
        //echo Crypt::decrypt('h3vPU8JGuF3VS/uxIpjRSw== ');//admin888

//        //测试数据库
//        $data=db('admin')->find(1);
//        dump($data);


        if(request()->isPost()){
            //halt($_POST);
           $res=(new Admin())->login(input('post.'));
            if($res['valid'])
            {
                //说明登录成功
                $this->success($res['msg'],'admin/entry/index');exit;
            }else{
                //说明登录失败
                $this->error($res['msg']);exit;
            }
        }
        //登陆页面
        return $this->fetch('login');


    }
}

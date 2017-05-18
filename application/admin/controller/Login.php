<?php

namespace app\admin\controller;

use think\Controller;

class Login extends Controller
{
    public  function login()
    {
//        //测试数据库
//        $data=db('admin')->find(1);
//        dump($data);

        //登陆页面
        return $this->fetch();


    }
}

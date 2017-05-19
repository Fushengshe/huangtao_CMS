<?php

namespace app\admin\controller;

use app\common\model\Admin;
use think\Controller;

class Login extends Controller
{
    public  function login()
    {
//        //测试数据库
//        $data=db('admin')->find(1);
//        dump($data);


        if(request()->isPost()){
            //halt($_POST);
           $res=(new Admin())->login(input('post.'));

        }
        //登陆页面
        return $this->fetch();


    }
}

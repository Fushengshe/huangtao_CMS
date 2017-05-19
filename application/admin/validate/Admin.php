<?php
/**
 * Created by PhpStorm.
 * User: wo
 * Date: 2017/5/19
 * Time: 18:12
 */
namespace App\admin\validate;
class Admin extends Validate
{
       protected $rule=[
           'admin_username'=>'require',
           'admin_password'=>'require',
           'code'=>'require'
       ];
}
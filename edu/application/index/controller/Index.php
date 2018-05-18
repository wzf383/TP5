<?php
namespace app\index\controller;
use app\index\controller\Base;
class Index extends Base
{
    public function index()
    {
       // return "dd";
    	  $this->assign('title','学生管理系统');
    	$this->isLogin();
    	return view();
    }
}

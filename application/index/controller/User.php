<?php

namespace app\index\controller;

use think\Controller;

class User extends Controller{

    //前台登陆页
	public function login(){
		return $this->view->fetch();
	}

	//前台注册页
	public function register(){
		return $this->view->fetch();
	}

}
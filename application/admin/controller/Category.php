<?php

namespace app\admin\Controller;

use think\Controller;

class Category extends Controller{

	public function index(){
		return $this->view->fetch();
	}

	//分类添加
	public function add(){
		return $this->view->fetch();
	}
}
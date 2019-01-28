<?php

namespace app\admin\Controller;

use think\Controller;

class Test extends Controller{

	public function index(){
		return $this->view->fetch('public:base');
	}

	public function welcome(){
		return $this->view->fetch('public:welcome');
	}
}
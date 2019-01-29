<?php

namespace app\admin\Controller;

use think\Controller;

use think\Request;

use think\Loader;
use app\admin\validate\Category as CategoryValidate;
use app\admin\model\Category as CategoryModel;



class Category extends Controller{

	protected $obj;

	public function _initialize(){
		$this->obj = new CategoryModel();
	}

	public function index(Request $request){
		$parent_id = $request->param('parent_id') ? $request->param('parent_id') : 0;
		$categorys = $this->obj->getFirstCategorys($parent_id);
		return $this->view->fetch('',['categorys'=>$categorys]);
	}

	//分类添加
	public function add(){
		$categorys =  $this->obj->getNormalFirstCategory();
		// $this->view->assign('highs',$highs);
		return $this->view->fetch('',['categorys'=>$categorys]);
	}

	//分类添加逻辑
	public function save(Request $request){
		$data = $request->post();
		$validate = new CategoryValidate();
		if(!$validate->scene('add')->check($data)){
			return ['code'=>0,'msg'=>$validate->getError()];
		}
		$CategoryModel = new CategoryModel();
		$res = $CategoryModel->add($data);
		if($res){
			return ['code'=>1,'msg'=>'添加成功'];
		}
	}
}
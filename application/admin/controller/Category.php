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

	//分类编辑
	public function edit(Request $request){
		$id = $request->param('id');
		$categorys = $this->obj->getNormalFirstCategory();
		$cate = $this->obj->get($id);
		$this->view->assign('cate',$cate);
		return $this->view->fetch('',['categorys'=>$categorys,'cate'=>$cate]);
	}

	//分类编辑逻辑
	public function update(Request $request){
		$data = $request->post();
		$validate = new CategoryValidate();
	    if(!$validate->scene('update')->check($data)){
	    	return ['code'=>0,'msg'=>$validate->getError()];
	    }
	    $id = $data['id'];
	    unset($data['id']);
	    $res = $this->obj->save($data,['id'=>$id]);
	    if($res){
	    	return ['code'=>1,'msg'=>'修改成功'];
	    }
	}

	//排序
	public function list(Request $request){
		$id = $request->post('id');
		$listorder = $request->post('listorder');
		$res = $this->obj->save(['listorder'=>$listorder],['id'=>$id]);
		if(!$res){
			return ['code'=>0,'msg'=>"排序出错"];
		}else{
			return ['code'=>1];
		}
	}

	//状态
	public function status(Request $request){
		$id  = $request->post('id');
		$status = $request->post('status');
		$res = $this->obj->save(['status'=>$status],['id'=>$id]);
		if($res){
			return ['code'=>1];
		}else{
			return ['code'=>0];
		}
	}

	//软删除单个
	public function del(Request $request){
		$id  = $request->post('id');
		$category = CategoryModel::find($id);
		$category->status = -1;
		$category->save();
		$res = CategoryModel::destroy($id);
		if($res){
			return ['code'=>1];
		}else{
			return ['code'=>0];
		}
	}

	//批量软删除
	public function dels(Request $request){
		$data = $request->post();
		foreach($data as $key => $val){
			$category = CategoryModel::find($val);
			$category->status = -1;
			$category->save();
		}
		$res  = CategoryModel::destroy($data);
		if($res){
			return ['code'=>1];
		}else{
			return ['code'=>0];
		}
	}

	//批量恢复
	public function restart(){
		$categorys = CategoryModel::onlyTrashed()->select();
		$data = [];
		foreach($categorys as $key => $val){
			$val->status = 1;
			$val->delete_time = null;
			$res = $val->save();
			if(!$res){
				$data[] = $key;
			}
		}
		if(count($data) <= 0){
			return ['code'=>1];
		}else{
			return ['code'=>0];
		}
	}
}
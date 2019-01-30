<?php

namespace app\admin\model;

use think\Model;
use traits\model\SoftDelete;

class Category extends Model{

	use SoftDelete;

	protected $pk = 'id';
	protected $table = 'o2o_category';
	protected $autoWriteTimestamp = true;
	protected $createTime = 'create_time';
	protected $updateTime = 'update_time';
	protected $deleteTime = 'delete_time';
	//protected $dateFormat = 'Y/m/d';

    //添加分类
	public function add($data){
		return $this->save($data);
	}

	//获取正常的一级栏目
	public function getNormalFirstCategory(){
		$data = [
			'status'    => 1,
			'parent_id' => 0
		];
		return $this->where($data)->order('listorder','desc')->select();
	}
    
    //获取一级栏目
    public function getFirstCategorys($id){
    	return $this->where('parent_id',$id)->order('listorder','desc')->paginate(15);
    }  
}
<?php

namespace app\admin\validate;

use think\Validate;

class Category extends Validate{

	protected $rule = [
		'name'=>'require|max:5',
		'parent_id' => 'require|integer',
		'listorder' => 'integer',
		'status'    => 'require|in:-1,0,1',
		'id'        => 'number'
	];

	protected $scene = [
		'add'       => ['name','parent_id'],
		'listorder' => ['id','listorder'],
		'status'    => ['id','status'],
		'update'    => ['id','name','parent_id'],
    ];
}

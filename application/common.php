<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件


function status($value){
	switch ($value) {
		case 1:
			return '<span class="label label-success radius">已启用</span>';
			break;
		case 0:
		    return '<span class="label label-default radius">审批</span>';
			break;
		default:
			return '<span class="label radius">已停用</span>';
			break;
	}
}
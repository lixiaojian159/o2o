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

/**
 * [status 获取分类的状态]
 * @param  [type] $value [description]
 * @return [type]        [description]
 */
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



/**
 * [doCurl curl的get请求]
 * @param  [type] $url [description]
 * @return [type]      [description]
 */
function doCurl($url){
	$curl = curl_init();
    //设置抓取的url
    curl_setopt($curl, CURLOPT_URL, $url);
    //设置头文件的信息作为数据流输出
    curl_setopt($curl, CURLOPT_HEADER, 0);
    //设置获取的信息以文件流的形式返回，而不是直接输出。
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    //执行命令
    $data = curl_exec($curl);
    //关闭URL请求
    curl_close($curl);
    //显示获得的数据
    return $data;
}
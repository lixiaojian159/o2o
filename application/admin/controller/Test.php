<?php

namespace app\admin\Controller;

use think\Controller;
use think\Request;
use Phpmailer\Mail;

class Test extends Controller{

	public function index(){
		return $this->view->fetch('public:base');
	}

	public function welcome(){
		return $this->view->fetch('public:welcome');
	}

	public function address(){
		$address = '百度大厦';
		//$sn = $this->makeSN($address);
		$data1 = [
			'address' => $address,
			'ak'      => 'i1STN7a58wVHV4qtD8BbRXhRMmadNWv7',
			'output'  => 'json',
			//'sn'      => $sn, 
		];
		$str = 'http://api.map.baidu.com/geocoder/v2/?'.http_build_query($data1);
		return doCurl($str);
	}

	public function makeSN($value){
		$ak = 'i1STN7a58wVHV4qtD8BbRXhRMmadNWv7';
		$sk = 'Vrq07fYp9C467gW4VKz23toLffugLDTi';
		//以Geocoding服务为例，地理编码的请求url，参数待填
        $url = "http://api.map.baidu.com/geocoder/v2/?address=%s&output=%s&ak=%s&sn=%s";
        //get请求uri前缀
        $uri = '/geocoder/v2/';
        //地理编码的请求中address参数
        $address = $value;
        //地理编码的请求output参数
        $output = 'json';
        //构造请求串数组
		$querystring_arrays = array (
			'address' => $address,
			'output' => $output,
			'ak' => $ak
		);
		//调用sn计算函数，默认get请求
        $sn = $this->caculateAKSN($ak, $sk, $uri, $querystring_arrays);
        //请求参数中有中文、特殊字符等需要进行urlencode，确保请求串与sn对应
        $target = sprintf($url, urlencode($address), $output, $ak, $sn);
        //输出计算得到的sn
        return $sn;
	}

	public function caculateAKSN($ak, $sk, $url, $querystring_arrays, $method = 'GET')
	{  
	    if ($method === 'POST'){  
	        ksort($querystring_arrays);  
	    }  
	    $querystring = http_build_query($querystring_arrays);  
	    return md5(urlencode($url.'?'.$querystring.$sk));  
	}

	public function test2(){
		$data = [
			'address' => '百度大厦',
			'ak'      => 'i1STN7a58wVHV4qtD8BbRXhRMmadNWv7',
			'output'  => 'json'
		];

		return http_build_query($data);
	}

	public function test3(){
		$arr = json_decode($this->address());
		$data = [
			'ak' => 'i1STN7a58wVHV4qtD8BbRXhRMmadNWv7',
			'width'=> '300',
			'height' => '200',
			'center' => '百度大厦',
			'markers'=> '百度大厦',
			'bbox'   => '500,600;800,900',
		];

		$str = 'http://api.map.baidu.com/staticimage/v2?'.http_build_query($data);
		return doCurl($str);
	}

	public function test4(){
		dump(Mail::send(1,2,3));
	}

	public function test5(){
		$res = get_loaded_extensions();
		dump($res);
	}
}
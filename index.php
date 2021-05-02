<?php
$ip = $_GET['ip'];
$port = $_GET['port'];
$filename = $ip.':'.$port.time().'.png';
$url = "http://xding.top/api/Motd/Api.php?ip=".$ip."&port=".$port;
$sever =  json_decode(file_get_contents($url),true);
if($sever['status']=='online'){
	$status = 'Online';
	$version = $sever['version'].'('.$sever['agreement'].') / '.$sever['gamemode'];
	$iport = 'IP: '.$ip.':'.$port;
	$people = '在线量: '.$sever['online'].'/'.$sever['max'];
	$ztpic = './static/green-32x32.png';
	$motd=preg_replace('/[^a-zA-Z0-9.]/','',$sever['motd']);
	if($motd==''){
	 $motd = 'Minecraft服务器';
	}
	if($sever['delay'] >= 9999){
		$sever['delay'] = 'Ping: 9999ms';
	}else{
		$sever['delay'] = 'Ping: '.$sever['delay'].'ms';
	}
}else{
	if ($ip == '') {
		$iport = '';
 	}else{
 		$iport = 'IP: '.$ip.':'.$port;
	}
	$status = 'Offline';
	$motd = '服务器已离线';
	$people = '在线量: 0/0';
	$version = '服务器已离线暂时无法获取游戏信息...';
	$ztpic = './static/red-32x32.png';
	$sever['delay'] = 'Ping: 999ms';
}


header("Content-type: image/PNG;filename=$filename");
use UAParser\Parser;
require_once 'vendor/autoload.php';

$im = imagecreatefrompng("./static/UI-small.png");
imagesavealpha($im,true);

$ztim = imagecreatefrompng($ztpic);
imagesavealpha($ztim,true);
$color=imagecolorallocate($ztim,255,255,255); 
imagecolortransparent($ztim,$color);
imagefill($ztim,0,0,$color); 
//目标图片开始x坐标｜目标图像开始 y 坐标，x,y同为0则从左上角开始｜拷贝图像开始x坐标｜拷贝图像开始 y 坐标x,y同为0则从左上角开始拷贝｜图片宽度｜图片高度｜图片透明度
imagecopymerge($im,$ztim,494,47,0,0,32,32,100);

$icoim = imagecreatefrompng('./static/glass.png');
imagesavealpha($icoim,true);
$colori=imagecolorallocate($icoim,255,255,255);
imagecolortransparent($icoim,$colori);
imagefill($icoim,0,0,$colori); 
imagecopymerge($im,$icoim,60,55,0,0,70,70,100);

$playerim = imagecreatefrompng('./static/MCico/player-32x32.png');
imagecopymerge($im,$playerim,492,121,0,0,32,32,100);

$pingim = imagecreatefrompng('./static/MCico/flag-32x32.png'); 
imagecopymerge($im,$pingim,492,84,0,0,32,32,100);

$timeim = imagecreatefrompng('./static/MCico/panda-32x32.png'); 
imagecopymerge($im,$timeim,492,158,0,0,32,32,100);

$black = ImageColorAllocate($im, 0,0,0);//定义黑色的值
$red = ImageColorAllocate($im, 255,0,0);
$blcak = ImageColorAllocate($im, 0,0,0);
$green = ImageColorAllocate($im, 0,170,0);
$white = ImageColorAllocate($im, 255,255,255);

$font = './static/Mojangles.ttf';//加载字体
$cnfont = './static/font/ZiZhiQuXiMaiTi-2.ttf';
$vfont = './static/font/old.ttf';
//输出
// 字体大小 倾斜角度(+数右倾斜) 左边距 顶部边距
imagettftext($im, 28, 0, 731, 78, $black, $font,$status);
imagettftext($im, 28, 0, 533, 78, $black, $font,$status);
imagettftext($im, 28, 0, 532, 77, $black, $font,$status);
imagettftext($im, 28, 0, 532, 79, $black, $font,$status);
imagettftext($im, 28, 0, 532, 78, $white, $font,$status);

imagettftext($im, 18, 0, 534, 110, $black, $font,$sever['delay']);
imagettftext($im, 18, 0, 532, 110, $black, $font,$sever['delay']);
imagettftext($im, 18, 0, 533, 109, $black, $font,$sever['delay']);
imagettftext($im, 18, 0, 533, 111, $black, $font,$sever['delay']);
imagettftext($im, 18, 0, 533, 110, $white, $font,$sever['delay']);

imagettftext($im, 15, 0, 531, 143, $black, $cnfont,$people);
imagettftext($im, 15, 0, 533, 143, $black, $cnfont,$people);
imagettftext($im, 15, 0, 532, 142, $black, $cnfont,$people);
imagettftext($im, 15, 0, 532, 144, $black, $cnfont,$people);
imagettftext($im, 15, 0, 532, 143, $white, $cnfont,$people);

imagettftext($im, 15, 0, 532, 170, $black, $font,date("Y-m-d"));
imagettftext($im, 15, 0, 532, 172, $black, $font,date("Y-m-d"));
imagettftext($im, 15, 0, 533, 171, $black, $font,date("Y-m-d"));
imagettftext($im, 15, 0, 531, 171, $black, $font,date("Y-m-d"));
imagettftext($im, 15, 0, 532, 171, $white, $font,date("Y-m-d"));

imagettftext($im, 15, 0, 533, 190, $black, $font,date("H:i:s"));
imagettftext($im, 15, 0, 531, 190, $black, $font,date("H:i:s"));
imagettftext($im, 15, 0, 532, 189, $black, $font,date("H:i:s"));
imagettftext($im, 15, 0, 532, 191, $black, $font,date("H:i:s"));
imagettftext($im, 15, 0, 532, 190, $white, $font,date("H:i:s"));

imagettftext($im, 25, 0, 140, 85, $white, $cnfont,$motd);
imagettftext($im, 20, 0, 140, 120, $white, $font,$iport);
imagettftext($im, 20, 0, 60, 150, $white, $font,'--------------------------');
if($status=='Online'){
$jsfont = $font;
}else{
$jsfont = $cnfont;
}
imagettftext($im, 15, 0, 60, 170, $white, $jsfont,$version);

ImagePng($im);
ImageDestroy($im);


function curl_get($url, array $params = array(), $timeout = 6){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $file_contents = curl_exec($ch);
    curl_close($ch);
    return $file_contents;
}
?>



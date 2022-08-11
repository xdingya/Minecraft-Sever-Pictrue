<?php
$ip = $_GET['ip'];
$port = $_GET['port'];
$url = "https://xding.top/Api/MCsever/Api.php?ip=".$ip."&port=".$port;
$sever =  json_decode(file_get_contents($url),true);
$motd=preg_replace('/[^a-zA-Z0-9.]/','',$sever['motd']);
	if($motd==''){
	 $motd = 'Minecraft服务器';
	}
?>
<!DOCTYPE html>

<html class="mcui-scrollbar">

<head>
    <meta charset="UTF-8">
    <meta name="baidu-site-verification" content="code-vIOf4qiiiI" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>一键加入服务器</title>

    <!-- ICO : MCUI -->
	<link rel="shortcut icon" href="https://mcui.kaiwen.design/usr/themes/mcui/favicon.ico"/>

    <!-- CSS :: MDUI : v1.0.1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mdui@1.0.1/dist/css/mdui.min.css" integrity="sha384-cLRrMq39HOZdvE0j6yBojO4+1PrHfB7a9l5qLcmRm/fiWXYY+CndJPmyu5FV/9Tw" crossorigin="anonymous" />

    <!-- CSS :: Bootstrap : v5.0 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- JS :: Jquery : v3.5.1 -->
    <script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- CSS :: Swiper : v6.4.5 -->
    <link rel="stylesheet" href="https://mcui.kaiwen.design/usr/themes/mcui/static/css/swiper-bundle.min.css">

    <!-- CSS :: Mojang : v6.2.8 -->
    <link rel="stylesheet" href="https://mcui.kaiwen.design/usr/themes/mcui/static/css/Mojang.min.css">

    <!-- CSS :: MCUI -->
    <link href="static/css/mcui.css" rel="stylesheet">

</head>

<body>
<div class="mcui-background-wool-light" style="padding-top: 10px;">
<div class="container">
<div class="mdui-container">
    <img style="width:100%; height:auto;" src="https://xding.top/Api/MCsever/index.php?ip=<?php echo $ip?>&port=<?php echo $port?>"/>
    </div>
        <div class="text-center" style="margin-top:10px"><a href="minecraft://?addExternalServer=<?php echo $motd?>-%E5%B0%8F%E4%B8%81%E7%9A%84MOTD%E8%B4%B4%E5%9B%BE%E7%B3%BB%E7%BB%9F%7C<?php echo $ip?>:<?php echo $port?>" target="_blank"><button style="margin-bottom:10px" class="mcui-btn-base">加入服务器</button></a></div>
	</div>
</div>




	<!-- Baidu :: tongji -->
	<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?a05ddfffd8a6a3216501f1488f003586";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>

    
    <!-- JS :: Jquery : v3.5.1 -->
    <script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- JS :: KDUI -->
    <script src="https://mcui.kaiwen.design/usr/themes/mcui/static/js/kdui.js"></script>

    <!-- JS :: Bootstrap : v5.0 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- JS :: MDUI : v1.0.1 -->
    <script src="https://cdn.jsdelivr.net/npm/mdui@1.0.1/dist/js/mdui.min.js" integrity="sha384-gCMZcshYKOGRX9r6wbDrvF+TcCCswSHFucUzUPwka+Gr+uHgjlYvkABr95TCOz3A" crossorigin="anonymous"></script>

    <!-- JS :: Swiper : v6.4.5 -->
    <script src="https://mcui.kaiwen.design/usr/themes/mcui/static/js/swiper-bundle.min.js"></script>

    <!-- JS :: waterfall -->
    <script src="https://mcui.kaiwen.design/usr/themes/mcui/static/js/waterfall.js"></script>

  

</body>

</html>
<?php

session_start();

$pic = array(
	"p1"=>"成龙",
	"p2"=>"杨澜",
	"p3"=>"爱因斯坦"
);

$index = rand(1,count($pic));
$filename = dirname(__FILE__)."\\p"."$index".".jpg";
$content = file_get_contents($filename);

$_SESSION["captcha_img"] = $pic["p"."$index"];

header("content-type:image/jpeg");
echo $content;

?>

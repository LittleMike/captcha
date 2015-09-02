<?php

define('WIDTH',100);
define("HEIGHT",50);
define("CHARNUM",4);
define("OFFSETX",15);
define("OFFSETY",5);
define("OFFSETDIS",18);
define("OFFSETBASE",25);
define("PIXELNUM",200);
define("LINENUM",5);
define("CHARSIZE",5);
define("HANZISIZE",13);

$img = imagecreatetruecolor(WIDTH,HEIGHT);

$White = imagecolorallocate($img,0xff,0xff,0xff);
imagefill($img,0,0,$White);

session_start();
$_SESSION['captcha'] = "";
// $chars = "acdefghijkmnprstuvwxy34578";
// for($i=1;$i<=CHARNUM;$i++)
// {
	// $Color = imagecolorallocate($img,rand(0,128),rand(0,128),rand(0,128));
	// $char = $chars[rand(0,strlen($chars)-1)];
	// imagestring($img,CHARSIZE,OFFSETX*$i,rand(OFFSETY,HEIGHT/2),$char,$Color);
	// $_SESSION['captcha'] .= "$char";
// }

$hanzi = "松岛枫哈上课了了沙发饿哦卡了和打法诶黑管理和光荣"
."发儿了你饭卡泸沽湖我翻了翻罢了日体彩两个家庭饿哦";
$chars = str_split($hanzi,3);
for($i=1;$i<=CHARNUM;$i++)
{
	$Color = imagecolorallocate($img,rand(0,128),rand(0,128),rand(0,128));
	$char = $chars[rand(0,count($chars)-1)];
	imagettftext($img,HANZISIZE,rand(-45,45),OFFSETDIS*$i,OFFSETBASE,$Color,"fzhtjt.TTF",$char);
	$_SESSION['captcha'] .= "$char";
}

for($i=0;$i<PIXELNUM;$i++)
{
	$Color = imagecolorallocate($img,rand(128,255),rand(128,255),rand(128,255));
	imagesetpixel($img,rand(0,WIDTH),rand(0,HEIGHT),$Color);
}

for($i=0;$i<LINENUM;$i++)
{
	$Color = imagecolorallocate($img,rand(150,255),rand(150,255),rand(150,255));
	imageline($img,rand(0,WIDTH),rand(0,HEIGHT),rand(0,WIDTH),rand(0,HEIGHT),$Color);
}

header("content-type:image/png");
imagepng($img);

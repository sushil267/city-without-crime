<?php
header("Content-type:image/png");
session_start();
$str=strtoupper(substr(md5(time() * microtime()),0,8));
$_SESSION['str']=$str;
$handle=imagecreate(100,50) or die("Can't create image");
$bg_color=imagecolorallocate($handle,2,10,0);
$textcolor=imagecolorallocate($handle,400,200,200);
imagestring($handle,100,10,18,$str,$textcolor);
imagepng($handle);
?>

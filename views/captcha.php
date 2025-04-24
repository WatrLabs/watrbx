<?php

use watrbx\sitefunctions;
$func = new sitefunctions();

$captcha = $func->genstring(10);



$captcha4cookie = array(
    "padding"=>rand(1,99999),
    "padding1"=>rand(1,99999),
    "padding2"=>rand(1,99999),
    "padding3"=>rand(1,99999),
    "padding4"=>rand(1,99999),
    "padding5"=>rand(1,99999),
    "padding6"=>rand(1,99999),
    "padding7"=>rand(1,99999),
    "padding8"=>rand(1,99999),
    "padding9"=>rand(1,99999),
    "padding0"=>rand(1,99999),
    "padding"=>rand(1,99999),
    "whattherufkc"=>$func->encrypt($func->encrypt($captcha)),
    "padding"=>rand(1,99999),
    "fuckyoubotter"=>"yea man fuck you " . rand(1,99999),
);

$captchacookie = $func->encrypt(json_encode($captcha4cookie));

setcookie("captcha", $captchacookie, time() + 8400);

$im = imagecreatetruecolor(467, 24); 


$bg = imagecolorallocate($im, 22, 86, 165);

$fg = imagecolorallocate($im, 255, 255, 255);

imagefill($im, 0, 0, $bg); 

imagestring($im, rand(1, 467), rand(1, 350),
			rand(1, 7), $captcha, $fg);
			
for ($i = 0; $i < 5; $i++) {
    $line_color = imagecolorallocate($im, rand(100, 255), rand(100, 255), rand(100, 255));
    imageline($im, rand(0, 467), rand(0, 24), rand(0, 467), rand(0, 24), $line_color);
}

header("Cache-Control: no-store, no-cache, must-revalidate"); 

header('Content-type: image/png');

imagepng($im); 

imagedestroy($im);
?>

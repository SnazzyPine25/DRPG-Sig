<?php
header('content-type: image/png');

$key = "";
$agent = "";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.discorddungeons.me/user/"+$_GET['u']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_USERAGENT, $agent);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-Api-Key: '.$key));
$data = json_decode(curl_exec($ch), true)["user"]['data'];

$dir='./resources/';

$rfont='tahoma.ttf';
$bfont='tahomabd.ttf';

$str_bg='bg.png';

$bg=imagecreatefrompng($dir.$str_bg);
imagesavealpha($bg,true);
$res_font_color=imagecolorallocate($bg,0,192,192);

if($ch==null) {
	echo 'invalid id';
} else {
	$str_json=json_decode($str_content,true);

	# $avatar=imagecreatefromjpeg($data['']);
	# imagecopy($bg,$res_avatar,5,5,0,0,64,64);

	imagettftext($bg,$num_font_size,11,54,22,$res_font_color,$dir.$bfont,$data['name']);
	imagettftext($bg,$num_font_size,5,54,33,$res_font_color,$dir.$rfont,$data['gold']);

	imagepng($bg,$str_sig_file,9);
	imagepng($bg,NULL,9);
	imagedestroy($bg);
}
?>

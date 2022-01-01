<?php

$url = "https://c.xkcd.com/random/comic/";
$ch  = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$a = curl_exec($ch);
$url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
$str  = file_get_contents($url.'info.0.json');
$json = json_decode($str, true);
$imageTitle = $json['title'];
$imageUrl = $json['img'];
$imageAlt = $json['alt'];
$imageFile = file_get_contents($imageUrl);


//include('smtp/PHPMailerAutoload.php');
$html=$message = '
<html>
<head>
<title>Your email '.$to.' is listed in our XKCD comics subscribers.</title>
</head>
<body> 
    <h1>'.$imageTitle.'</h1>
    <img src='.$imageUrl.' alt='.$imageAlt.'>
</body>
</html>';
mail($to, $subject, $body);
/*echo smtp_mailer('dumyui81@gmail.com','subject',$html);
function smtp_mailer($to,$subject, $msg){
	$mail = new PHPMailer(); 
	$mail->SMTPDebug  = 3;
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "dumyui81@gmail.com";
	$mail->Password = "@#ghghg234";
	$mail->SetFrom("dumyui81@gmail.com");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else{
		return 'Sent';
	}
}*/
?>


<?php

$mail_adresiniz	= "info@mottods.com";
$mail_sifreniz	= "Fatih1453!";
$gidecek_adres	= "info@mottods.com";
$domain_adresi	= "mottods.com";	//www olmadan yazınız

///////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////


require("include/class.php");
$mail = new PHPMail();
$mail->SMTPSecure = 'tls';
$mail->Host = 'smtp.yandex.com';
$mail->Port = 587;
$mail->SMTPAuth   = true;
$mail->Username   = $mail_adresiniz;
$mail->Password   = $mail_sifreniz;
$mail->IsSMTP();
$mail->AddAddress($gidecek_adres);
$mail->From       = $mail_adresiniz;
$mail->FromName   = $mail_adresiniz;
$mail->Subject    = $_POST["name"];
$mail->Body       = $_POST["email"]."\n\n\n\n".$_POST["comments"];
$mail->AltBody    = "";


function tommus_email_validate($email) { return filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match('/@.+\./', $email); }


$name = $_POST['name']; 
$email = $_POST['email']; 
$comments = $_POST['comments'];


if(trim($name) == '') {

	exit('<div class="error_message">lütfen ad soyad giriniz.</div>');

} else if(trim($name) == 'ad soyad') {

	exit('<div class="error_message">lütfen ad soyad giriniz.</div>');

} else if(trim($email) == 'e-posta') {

	exit('<div class="error_message">lütfen e-posta adresinizi giriniz.</div>');

} else if(!tommus_email_validate($email)) {

	exit('<div class="error_message">lütfen e-posta adresinizi kontrol ediniz.</div>');

} else if(trim($comments) == 'mesaj...') {

	exit('<div class="error_message">lütfen bir mesaj giriniz...</div>');

} else if(trim($comments) == '') {

	exit('<div class="error_message">lütfen bir mesaj giriniz...</div>');
	
} else if( strpos($comments, 'href') !== false ) {

	exit('<div class="error_message">lütfen bağlantıları düz metin olarak ekleyiniz.</div>');
	
} else if( strpos($comments, '[url') !== false ) {

	exit('<div class="error_message">lütfen bağlantıları düz metin olarak ekleyiniz.</div>');

} if(get_magic_quotes_gpc()) { $comments = stripslashes($comments); }




$e_subject = 'You\'ve been contacted by ' . $name . '.';

$e_body = "You have been contacted by $name from your contact form, their additional message is as follows." . "\r\n" . "\r\n";

$e_content = "\"$comments\"" . "\r\n" . "\r\n";

$e_reply = "You can contact $name via email, $email";



$msg = wordwrap( $e_body . $e_content . $e_reply, 70 );



$headers = "From: $email" . "\r\n";

$headers .= "Reply-To: $email" . "\r\n";

$headers .= "MIME-Version: 1.0" . "\r\n";

$headers .= "Content-type: text/plain; charset=utf-8" . "\r\n";

$headers .= "Content-Transfer-Encoding: quoted-printable" . "\r\n";



if($mail->Send()){echo "<fieldset><div id='success_page'><h4>gönderildi!</h4></div></fieldset>"; }

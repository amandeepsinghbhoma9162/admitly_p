<?php
$captchaSecretKey = "Your_reCaptcha_Secret_Key";
//reCAPTCHA validation
if (isset($_POST['g-recaptcha-response'])) {

	$postData = array(
		'secret' => $captchaSecretKey,
		'response' => $_POST['g-recaptcha-response']
    );
    $url = "https://www.google.com/recaptcha/api/siteverify";

	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($postData));
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$serverResponse = curl_exec($curl);

	if(json_decode($serverResponse,true)['success'] == 1)
	{
		echo '<b>Captcha</b> Validated!';
		exit;
	}
	else
	{
		echo '<b>Captcha</b> Validation Required!';
		exit;
	}	
}
?>
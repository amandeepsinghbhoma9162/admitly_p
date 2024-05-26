<?php

// configure


$Host="localhost";
$User="admitoff_data8aseUser";
$Password="hYh!$^ZC622J";
$Database="admitoff_data8ase";


/*$con=mysqli_connect($host,$user,$password,$db);
if(!$con)
echo "connection unsuccessful";
else
echo "connection successful";*/
// $mysqli = new mysqli($Host, $User, $Password, $Database);
 $con = mysqli_connect($Host,$User,$Password,$Database);

if(!$con)
echo "connection unsuccessful";
else
echo "connection successful";
$uid = substr($_POST['agent_uid'],2,9);

$sql = "SELECT * FROM agents where id = ".$uid;
$result = $con->query($sql);
echo $result->num_rows;

die();



$emailfrom = $_POST['email']; 
$headers1 = "MIME-Version: 1.0" . "\r\n";
$headers1 .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
$headers1 .= "From: ".$emailfrom;
$headersFrom .= "From: ".$emailfrom;

$sendTo = 'contact@admitoffer.com';

$subject = 'New message from CANADA & UK MEET form';

$fields = ['agent_uid' => 'UID','firstname' => 'First Name','lastname' => 'Last Name', 'phone' => 'Phone', 'email' => 'Email', 'city' => 'City', 'organization' => 'Organization']; // array variable name => Text to appear in email


$okMessage = 'Contact form successfully submitted. Thank you, We will get back to you soon!';

$errorMessage = 'There was an error while submitting the form. Please try again later';

$captcha=$_POST['g-recaptcha-response'];

$secretKey = '6LfXKBAaAAAAAGeMIk18-VviWmbMZN5VHNb2m_TK';

// let's do the sending

try

{

	$ch = curl_init();

curl_setopt_array($ch, [

    CURLOPT_URL => 'https://www.google.com/recaptcha/api/siteverify',

    CURLOPT_POST => true,

    CURLOPT_POSTFIELDS => [

        'secret' => $secretKey,

        'response' => $captcha,

        'remoteip' => $_SERVER['REMOTE_ADDR']

    ],

    CURLOPT_RETURNTRANSFER => true

]);

$output = curl_exec($ch);

curl_close($ch);

$json = json_decode($output);

		if (isset($json->success) && $json->success) {

    $emailText = "You have new message from contact form <br> ============================= <br>";
    foreach ($_POST as $key => $value) {
        if (isset($fields[$key])) {
            $emailText .= "$fields[$key]: $value<br>";
        }
    }

    $mailldd = mail($sendTo, $subject, $emailText, $headersFrom);
    $responseArray = array('type' => 'success', 'message' => $okMessage);

}
}

catch (\Exception $e)

{

    $responseArray = array('type' => 'danger', 'message' => $errorMessage);

}

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

    $encoded = json_encode($responseArray);

    header('Content-Type: application/json');

    echo $encoded;

}

else {

    echo $responseArray['message'];

}
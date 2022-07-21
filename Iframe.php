<?php
include_once('OAuth.php');
include 'vendor\autoload.php';
use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/.env');

$ConsumerKey=$_ENV['ConsumerKey'];
$ConsumerSecret=$_ENV['ConsumerSecret'];


//pesapal params
$token = $params = NULL;

/*
PesaPal Sandbox is at https://demo.pesapal.com. Use this to test your developement and 
when you are ready to go live change to https://www.pesapal.com.
*/
$consumer_key = $ConsumerKey;//Register a merchant account on
                   //demo.pesapal.com and use the merchant key for testing.
                   //When you are ready to go live make sure you change the key to the live account
                   //registered on www.pesapal.com!
$consumer_secret = $ConsumerSecret;// Use the secret from your test
                   //account on demo.pesapal.com. When you are ready to go live make sure you 
                   //change the secret to the live account registered on www.pesapal.com!
$signature_method = new OAuthSignatureMethod_HMAC_SHA1();
$iframelink = 'https://www.pesapal.com/API/PostPesapalDirectOrderV4';//change to      
                   //htt    ps://www.pesapal.com/API/PostPesapalDirectOrderV4 when you are ready to go live!

//get form details

if(isset($_POST)){
    $amount = $_POST['amount'];
$amount = number_format($amount, 2);//format amount to 2 decimal places

$desc = $_POST['description'];
$type = $_POST['type']; //default value = MERCHANT
$reference = $_POST['reference'];//unique order id of the transaction, generated by merchant
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phonenumber = '';//ONE of email or phonenumber is required

$callback_url = 'http://139.162.168.130/pesapal/callback.php'; //redirect url, the page that will handle the response from pesapal.
$post_xml = '<?xml version="1.0" encoding="utf-8"?>';
$post_xml .= '<PesapalDirectOrderInfo ';
$post_xml .= 'xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" ';
$post_xml .= 'xmlns:xsd="http://www.w3.org/2001/XMLSchema" ';
$post_xml .= 'Amount="'.$amount.'" ';
$post_xml .= 'Description="'.$desc.'" ';
$post_xml .= 'Type="'.$type.'" ';
$post_xml .= 'Reference="'.$reference.'" ';
$post_xml .= 'FirstName="'.$first_name.'" ';
$post_xml .= 'LastName="'.$last_name.'" ';
$post_xml .= 'Email="'.$email.'" ';
$post_xml .= 'PhoneNumber="'.$phonenumber.'" ';
$post_xml .= 'xmlns="http://www.pesapal.com" />';
$post_xml = htmlentities($post_xml);


$consumer = new OAuthConsumer($consumer_key, $consumer_secret);

//post transaction to pesapal
$iframe_src = OAuthRequest::from_consumer_and_token($consumer, $token, "GET", $iframelink, $params);
$iframe_src->set_parameter("oauth_callback", $callback_url);
$iframe_src->set_parameter("pesapal_request_data", $post_xml);
$iframe_src->sign_request($signature_method, $consumer, $token);

//display pesapal - iframe and pass iframe_src


$result['result'] ='<iframe src="'.$iframe_src.'" width="100%"height="700px"  scrolling="no" frameBorder="0">
	<p>Browser unable to load iFrame</p>
</iframe>"';
echo json_decode($result);
}

else{
    $result ="No result";
    echo json_decode($result);

}
?>
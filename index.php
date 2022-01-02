<?php

include('Mailin.php');
use Sendinblue\Mailin;
$api_key = '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';

$from_email = 'dumyui81@gmail.com';
$from_name = 'Name of Sender';

$to_email = 'dumyui81@gmail.com';
$to_name = 'Name of Receiver';
$subject = 'This is the subject';
$message = '<h2>Heading 2</h2><p>Here goes the paragraph blah blah blah</p>';

$mailin = new Mailin('https://api.sendinblue.com/v3.0',$api_key);
$data = array( 
  "to" => array($to_email=>$to_name),
  "from" => array($from_email,$from_name),
  "subject" => $subject,
  "html" => $message,
  "attachment" => array()
);

$response = $mailin->send_email($data);
if(isset($response['code']) && $response['code']=='success'){
  echo 'Email Sent';
}else{
  echo 'Email not sent';
}
exit;
?>

<?php

include('Mailin.php');
use Sendinblue\Mailin;
$api_key = '**********';

$from_email = '*****@gmail.com';
$from_name = 'Name of Sender';

$to_email = '******@gmail.com';
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

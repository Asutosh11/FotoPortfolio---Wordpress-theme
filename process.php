<?php

if (!empty($_POST['contact_submit']))

{

$name = $_POST['name'] ;
$email = $_POST['email'] ;
$message = $_POST['message'] ;


$to = get_option('admin_email');

$subject = 'Message from your website user' ;

$body = "Sender's Email address : " . "$email" . "<br>" ."Sender's Name : " . "$name" . "<br>" . "<br>" . " " . "Message: " . $message ;


mail($to, $subject, $body) ;

}

?>
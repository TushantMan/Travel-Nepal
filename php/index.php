<?php
	$dbhost = 'localhost';  
	$dbuser = 'root';            
	$dbpass = '';          
	$dbbase = 'user';
	$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbbase);
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }
  
  mysqli_query($con, "set names utf8");
  
  $name = $_POST['name'];
  $visitoremail = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];
  $sql="INSERT INTO `userdetail` (`id`, `name`, `email`, `subject`, `message`, `date`) VALUES (NULL, '$name', '$visitoremail', '$subject', '$message', current_timestamp())"; 
  
$retval = mysqli_query($con, $sql);

if (! $retval)
  {
  die('Error: ' . mysqli_error($con));
  }
  $email_from = 'info@website.com';

$email_subject = 'Contacting Through Site';

$email_body = "User Name: $name.\n".
                "User Email: $visitoremail.\n".
                "Subject: $subject.\n".
                "User Message: $message.\n".

$to = 'me@mail.com';

$headers = "From: $email_from \r\n";

$headers .= "Reply-To: $visitor_email \r\n";

mail($to,$email_subject,$email_body,$headers);

header("Location:sent.html");
mysqli_close($con);
?>
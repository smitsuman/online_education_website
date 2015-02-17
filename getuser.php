<?php
error_reporting(E_ALL); ini_set('display_errors', 'On');

$fname = $_POST['fname'];
$email = $_POST['email'];
$hash=md5(rand(0,1000));
$con = mysqli_connect('localhost','828110','aryamanisme','828110') or exit();

mysqli_select_db($con,"learnix");
$sql="insert into subscribe (Name,Email,Hash) values('$fname','$email','$hash')";

if (!mysqli_query($con,$sql))
{
  die("Error:".mysqli_error($con));
  //echo "Error". mysqli_error($con);
}
else
{
echo "Mail sent for Confirmation";

$to      = $email;   // Send email to our user
$subject = 'Confirm your Email'; // Give the email a subject 
$message = '
 
Please click this link to activate your account:
http://codistan.freeoda.com/verify.php?email='.$email.'&hash='.$hash.'

 
'; // Our message above including the link
                     
$headers = 'From:donotreply@codistan.freeoda.com' . "\r\n"; // Set from headers
mail($to, $subject, $message, $headers); // Send our email
}
mysqli_close($con);
?>
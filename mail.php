<?php
// Include PHPMailerAutoload.php library file
include ("lib/PHPMailerAutoload.php");

$sen_name = "";
$sen_email = "";
$rec_email = "";
$email_sub = "";
$box_msg = "";
// Retrieving & storing user's submitted information
if (isset($_POST['sen_name'])) {
$sen_name = $_POST['sen_name'];
}
if (isset($_POST['sen_email'])) {
$sen_email = $_POST['sen_email'];
}
if (isset($_POST['rec_email'])) {
$rec_email = $_POST['rec_email'];
}
if (isset($_POST['email_sub'])) {
$email_sub = $_POST['email_sub'];
}
if (isset($_POST['box_msg'])) {
$box_msg = $_POST['box_msg'];
}

if (isset($_FILES) && (bool) $_FILES) {
$files = array();
$ext_error = "";
// Define allowed extensions
$allowedExtentsoins = array('pdf', 'doc', 'docx', 'gif', 'jpeg', 'jpg', 'png', 'rtf', 'txt','zip');
foreach ($_FILES as $name => $file) {
if (!$file['name'] == "") {
$file_name = $file['name'];
$temp_name = $file['tmp_name'];
$path_part = pathinfo($file_name);
$ext = $path_part['extension'];

// Checking for extension of attached files
if (!in_array($ext, $allowedExtentsoins)) {
echo "<script>alert('Sorry!!! ." . $ext ."Extension is not allowed!!! Try Again.')</script>";
$ext_error = FALSE;
}else{
$ext_error = True;
}

// Store attached files in uploads folder
$server_file = dirname(__FILE__) . "/uploads/" . $path_part['basename'];
move_uploaded_file($temp_name, $server_file);
array_push($files, $server_file);
}
}
if($ext_error != FALSE){
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";
$mail->Host = "smtp.gmail.com";
$mail->Port = 465;

// Enable SMTP authentication
$mail->SMTPAuth = true;

// SMTP username (e.g xyz@gmail.com)
$mail->Username = '<-- SMTP Username -->';

// SMTP password
$mail->Password = '<-- SMTP password -->';

// Enable encryption, 'tls' also accepted
$mail->SMTPSecure = 'ssl';

// Sender Email address
$mail->From = $sen_email;

// Sender name
$mail->FromName = $sen_name;

// Receiver Email address
$mail->addAddress($rec_email);

// Attaching files in the mail
foreach ($files as $file) {
$mail->addAttachment($file);
}
$mail->Subject = $email_sub;
$mail->Body = $box_msg;
$mail->WordWrap = 50;

// Sending message and checking status
if (!$mail->send()) {
echo "<script>alert('Sorry!!! Message was not sent. Mailer error: " . $mail->ErrorInfo . ")</script>";
exit;
} else {
echo "<script>alert('Congratulations!!! Your Email has been sent successfully!!!')</script>";
}
// Deleting files from the uploads folder
foreach ($files as $file) {
unlink($file);
}
echo "<script>window.location='index.php';</script>";
}else{
foreach ($files as $file) {
unlink($file);
}
echo "<script>window.location='index.php';</script>";
}
}
?>
<script src="js/jquery.js"></script>
?>
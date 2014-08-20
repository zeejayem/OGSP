<?php

// check for form submission - if it doesn't exist then send back to contact form
if (!isset($_POST['save']) || $_POST['save'] != 'contact') {
    header('Location: contact.php'); exit;
}

/* Set e-mail recipient */
$myemail = "zarah.mcintosh@gmail.com";

/* Check all form inputs using check_input function */
$name = check_input($_POST['input1']);
$email = check_input($_POST['input2']);
$phone = check_input($_POST['input3']);
$message = check_input($_POST['input4']);

// check that a name was entered
if (empty($name))
    $error = 'You must enter your name.';
// check that an email address was entered
elseif (empty($email)) 
    $error = 'You must enter your email address.';
// check for a valid email address
elseif (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
    $error = 'You must enter a valid email address.';
// check that a phone number was entered
elseif (empty($phone))
    $error = 'You must enter your phone number.';
// check that a message was entered
elseif (empty($message))
    $error = 'You must enter a message.';
		
// check if an error was found - if there was, send the user back to the form
if (isset($error)) {
    header('Location: contact.php?e='.urlencode($error)); exit;
}

// check if an error was found - if there was, send the user back to the form
if (isset($error)) {
    header('Location: contact.php?e='.urlencode($error)); exit;
}

$headers = "From: $email\r\n"; 
$headers .= "Reply-To: $email\r\n";

// write the email content
$email_content = "Name: $name\n";
$email_content .= "Email Address: $email\n";
$email_content .= "Phone Number: $phone\n";
$email_content .= "Message:\n\n$message";
	
// send the email
//ENTER YOUR INFORMATION BELOW FOR THE FORM TO WORK!
mail($myemail, $email_content, $headers);
	
// send the user back to the form
header('Location: contact.php?s='.urlencode('Thank you for your message.')); exit;

?>











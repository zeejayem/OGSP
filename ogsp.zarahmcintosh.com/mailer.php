<?php
/* Set e-mail recipient */
$myemail = "zarah.mcintosh@gmail.com";

/* Check all form inputs using check_input function */
$name = check_input($_POST['contact_name'], "Name required");
$email = check_input($_POST['contact_email'], "E-mail required");
$phone = check_input($_POST['contact_phone'], "Phone required");
$message = check_input($_POST['contact_message'], "Message required");

/* If e-mail is not valid show error message */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
show_error("Invalid e-mail address");
}
/* Let's prepare the message for the e-mail */

$subject = "Olympic GSP via OGSP";

$message = "

Olympic GSP Message Form:

Name: $name
Email: $email
Phone: $phone

Message:
$message

";

/* Send the message using mail() function */
mail($myemail, $subject, $message);

/* Redirect visitor to the thank you page */
// send the user back to the form
header('Location: contact.php?s='.urlencode('Thank you for your message.'));
exit();

/* Functions we used */
function check_input($data, $problem='')
{
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
if ($problem && strlen($data) == 0)
{
show_error($problem);
}
return $data;
}

function show_error($myError){
	header('Location: contact.php?e='.urlencode($myError)); exit;
}

?>
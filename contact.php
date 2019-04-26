<html>
<head>
<title>Contact</title>
</head>
<message>
<?php
  $recipient = 'contact@caseysarapas.com';
  $email = $_POST['email'];
  $name = $_POST['name'];
  $subject = ‘new message via webform’;
  $message = $_POST['message'];
  # We'll make a list of error messages in an array
  $errors = array();
# Allow only reasonable email addresses
if (!preg_match("/^[\w\+\-.~]+\@[\-\w\.\!]+$/", $email)) {
$errors[] = "Invalid email address.";
}
# Allow only reasonable names
if (!preg_match("/^[\w\ \+\-\'\"]+$/", $name)) {
$errors[] = "Invalid name.";
}
$message = $_POST['message'];
# Make sure the message has a message
if (preg_match('/^\s*$/', $message)) {
$errors[] = "Your message was blank. Did you mean to say " .
"something?"; 
}
  if (count($errors)) {
    # There were problems, so tell the user and
    # don't send the message yet
    foreach ($errors as $error) {
      echo("<p>$error</p>\n");
    }
    echo("<p>Click the back button and correct the problems. " .
      "Then click Send Message again.</p>");
  } else {
    # Send the email - we're done
mail($recipient,
      $subject,
      $message,
      "From: $name <$email>\r\n" .
      "Reply-To: $name <$email>\r\n"); 
    echo("<p>Thank you for your message! I will reply as soon as possible.</p>\n");
  }
/>
</message>
</html>

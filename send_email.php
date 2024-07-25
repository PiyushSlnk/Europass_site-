<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Your email address
    $to = "sighpiyuah7@gmail.com";

    // Email subject
    $email_subject = "New Contact Form Submission: $subject";

    // Email content
    $email_body = "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Phone: $phone\n\n";
    $email_body .= "Message:\n$message";

    // Send email
    mail($to, $email_subject, $email_body);

    // Redirect back to the contact page
    header("Location: contact.html");
    exit();
}
?>

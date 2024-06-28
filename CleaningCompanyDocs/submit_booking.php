<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $address = htmlspecialchars($_POST['address']);
    $service = htmlspecialchars($_POST['service']);
    $date = htmlspecialchars($_POST['date']);
    $time = htmlspecialchars($_POST['time']);
    $message = htmlspecialchars($_POST['message']);

    // Set email variables
    $to = "haganacleaningservices@gmail.com"; // Replace with your email address
    $subject = "New Service Booking Request";
    $headers = "From: no-reply@yourdomain.com\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Create email body
    $emailBody = "
        <h2>New Service Booking Request</h2>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Phone:</strong> $phone</p>
        <p><strong>Address:</strong> $address</p>
        <p><strong>Service:</strong> $service</p>
        <p><strong>Preferred Date:</strong> $date</p>
        <p><strong>Preferred Time:</strong> $time</p>
        <p><strong>Additional Details:</strong> $message</p>
    ";

    // Send email
    if (mail($to, $subject, $emailBody, $headers)) {
        echo "<h2>Booking Confirmation</h2>";
        echo "<p>Thank you for your booking request. We will get back to you shortly.</p>";
    } else {
        echo "<h2>Booking Failed</h2>";
        echo "<p>Sorry, there was an error processing your request. Please try again later.</p>";
    }
}
?>

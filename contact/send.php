<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Target email
    $to = "admin@cgtasia.net, info@birdiejet.net, darren.chancs@cgtasia.net"; // ← Replace with your actual email address
    $subject = "New Contact Form Submission - BirdieJet";

    // Collect and sanitize inputs
    $name     = htmlspecialchars($_POST["name"]);
    $pax      = htmlspecialchars($_POST["pax"]);
    $phone    = htmlspecialchars($_POST["phone"]);
    $email    = htmlspecialchars($_POST["email"]);
    $depart   = htmlspecialchars($_POST["depart_time"]);
    $return   = htmlspecialchars($_POST["return_time"]);
    $from     = htmlspecialchars($_POST["from"]);
    $to_dest  = htmlspecialchars($_POST["to"]);
    $sectors  = htmlspecialchars($_POST["sectors"]);
    $services = htmlspecialchars($_POST["services"]);
    $message  = htmlspecialchars($_POST["message"]);

    // Email content
    $body = "You have received a new contact form submission:\n\n";
    $body .= "Name: $name\n";
    $body .= "No. of Pax: $pax\n";
    $body .= "Phone: $phone\n";
    $body .= "Email: $email\n";
    $body .= "Depart Time: $depart\n";
    $body .= "Return Time: $return\n";
    $body .= "From: $from\n";
    $body .= "To: $to_dest\n";
    $body .= "Sectors: $sectors\n";
    $body .= "Services: $services\n";
    $body .= "Message:\n$message\n";

    // Email headers
    $headers = "From: sales@birdiejet.net\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Send mail
    $success = mail($to, $subject, $body, $headers);

    // Output
    if ($success) {
        echo "<h1>Thank you! Your message has been sent.</h2>";
    } else {
        echo "<h1>Sorry, there was an error sending your message. Please try again later.</h2>";
    }
} else {
    echo "<h1>Access Denied</h2>";
}
?>

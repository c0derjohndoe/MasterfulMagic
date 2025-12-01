<?php
// send_commission.php

// Configuration - Update with your email address
$to_email = "coderjohndoe63841@gmail.com";
$subject = "New Moodboard Commission Request";

// Get form data
$name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
$email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
$package = isset($_POST['package']) ? htmlspecialchars($_POST['package']) : '';
$project = isset($_POST['project']) ? htmlspecialchars($_POST['project']) : '';
$description = isset($_POST['description']) ? htmlspecialchars($_POST['description']) : '';
$deadline = isset($_POST['deadline']) ? htmlspecialchars($_POST['deadline']) : '';

// Package names
$package_names = [
    'fire' => '🔥 Fire Spark - FREE',
    'water' => '💧 Water Flow - $5',
    'earth' => '🌿 Earth Essence - $10',
    'storm' => '⛈️ Storm Force - $15'
];

$package_display = isset($package_names[$package]) ? $package_names[$package] : $package;

// Create email message
$message = "New Commission Request\n\n";
$message .= "Name: " . $name . "\n";
$message .= "Email: " . $email . "\n";
$message .= "Package: " . $package_display . "\n";
$message .= "Project Type: " . $project . "\n";
$message .= "Description: " . $description . "\n";
$message .= "Desired Deadline: " . ($deadline ? $deadline : 'Not specified') . "\n";

// Email headers
$headers = "From: " . $email . "\r\n";
$headers .= "Reply-To: " . $email . "\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();

// Send email
$success = mail($to_email, $subject, $message, $headers);

// Return JSON response
header('Content-Type: application/json');
echo json_encode(['success' => $success]);

?>


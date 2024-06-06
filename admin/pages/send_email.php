<?php
// Include the database connection file
include 'connection.php';

// Function to fetch the email and send the email
function sendEmail($con, $user_id) {
    try {
        // Prepare and execute the SQL statement
        $stmt = $con->prepare("SELECT email FROM userinfo WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();

        // Fetch the email address
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($result && !empty($result['email'])) {
            $email = $result['email'];
            echo "Email found: " . $email . "<br>";

            // Send the email
            $to = $email;
            $subject = "Test Email";
            $message = "Hello, this is a test email.";
            $headers = "From: mdsakhawathossain17@gmail.com";

            if (mail($to, $subject, $message, $headers)) {
                echo "Email sent successfully to " . $email;
            } else {
                echo "Failed to send email.";
            }
        } else {
            echo "No email found for user ID: " . $user_id;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Specify the user ID
$user_id = 3; // Change this to the user ID you want to fetch

// Call the function to send the email
sendEmail($con, $user_id);
?>

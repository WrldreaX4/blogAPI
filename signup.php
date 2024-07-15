<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *"); // Allow all origins
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");

// Handle preflight request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

include 'connect.php';
require 'vendor/autoload.php'; // Include Composer's autoloader
use \Firebase\JWT\JWT;

$secret_key = "63448c0f19663276ceabdc626d7aab8855872cc7ef5b152d099c41dcbbccd4ce"; // Replace with your secret key
$issuer_claim = "http://localhost"; // This can be the server name
$audience_claim = "http://localhost"; // This can be the server name
$issuedat_claim = time(); // issued at
$notbefore_claim = $issuedat_claim + 10; // not before in seconds
$expire_claim = $issuedat_claim + 3600; // expire time in seconds

$data = json_decode(file_get_contents("php://input"));

if (isset($data->username) && isset($data->email) && isset($data->password)) {
    $username = $data->username;
    $email = $data->email;
    $password = password_hash($data->password, PASSWORD_BCRYPT);

    try {
        // Check if the email already exists
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            http_response_code(409);
            echo json_encode(["message" => "Email already exists"]);
        } else {
            // Insert the new user into the database
            $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);

            if ($stmt->execute()) {
                $user_id = $conn->lastInsertId();
                $token = array(
                    "iss" => $issuer_claim,
                    "aud" => $audience_claim,
                    "iat" => $issuedat_claim,
                    "nbf" => $notbefore_claim,
                    "exp" => $expire_claim,
                    "data" => array(
                        "id" => $user_id,
                        "username" => $username,
                        "email" => $email
                    )
                );

                $jwt = JWT::encode($token, $secret_key, 'HS256');
                echo json_encode(
                    array(
                        "message" => "Signup successful",
                        "jwt" => $jwt,
                        "username" => $username,
                        "email" => $email,
                        "expireAt" => $expire_claim
                    )
                );
            } else {
                http_response_code(500);
                echo json_encode(["message" => "Internal server error"]);
            }
        }
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(["message" => "Database error: " . $e->getMessage()]);
    }
} else {
    http_response_code(400);
    echo json_encode(["message" => "Username, email, and password are required"]);
}
?>

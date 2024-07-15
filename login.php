<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *"); // Allow all origins
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    // Handle preflight request
    http_response_code(200);
    exit();
}

include 'connect.php';
require 'vendor/autoload.php'; // Include Composer's autoloader
use \Firebase\JWT\JWT;

$secret_key = "63448c0f19663276ceabdc626d7aab8855872cc7ef5b152d099c41dcbbccd4ce"; // Replace with your secret key
$issuer_claim = "http://localhost"; // This can be the server name
$audience_claim = "http://localhost";
$issuedat_claim = time(); // issued at
$notbefore_claim = $issuedat_claim + 10; // not before in seconds
$expire_claim = $issuedat_claim + 3600; // expire time in seconds

$data = json_decode(file_get_contents("php://input"));

if (isset($data->email) && isset($data->password)) {
    $email = $data->email;
    $password = $data->password;

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $token = array(
            "iss" => $issuer_claim,
            "aud" => $audience_claim,
            "iat" => $issuedat_claim,
            "nbf" => $notbefore_claim,
            "exp" => $expire_claim,
            "data" => array(
                "id" => $user['user_id'],
                "email" => $user['email']
            )
        );

        $headers = array(
            "alg" => "HS256",
            "typ" => "JWT"
        );

        $jwt = JWT::encode($token, $secret_key, 'HS256');

        echo json_encode(array(
            "message" => "Login successful",
            "jwt" => $jwt,
            "email" => $email,
            "expireAt" => $expire_claim
        ));
    } else {
        http_response_code(401);
        echo json_encode(array("message" => "Invalid email or password"));
    }
} else {
    http_response_code(400);
    echo json_encode(array("message" => "Email and password are required"));
}
?>

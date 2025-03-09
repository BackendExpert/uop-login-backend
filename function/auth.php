<?php

    include "../config.php";
    require '../vendor/autoload.php';
    use Firebase\JWT\JWT;
    use Firebase\JWT\Key;

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
    header("Access-Control-Allow-Credentials: true");

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $data = json_decode(file_get_contents("php://input"), true);
        
        if (!isset($data['action'])) {
            echo json_encode(["error" => "Action not specified"]);
            exit;
        }
        
        if ($data['action'] === "login") {
            $email = $data['email'];
            $password = $data['password'];

            $checkstmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
            $checkstmt->execute([$email]);
            $user = $checkstmt->fetch(PDO::FETCH_ASSOC);
            
            if ($user) {
                if (password_verify($password, $user['password'])) {
                    $payload = [
                        'email' => $user['email'],
                        'exp' => time() + (60 * 60)
                    ];
                    $token = JWT::encode($payload, $secret_key, 'HS256');
                    echo json_encode(["message" => "Login successful", "email" => $user['email'], "status" => "Success", "token" => $token]);
                } else {
                    echo json_encode(["error" => "Invalid password"]);
                }
            }
            else{
                echo json_encode(["error" => "User Found"]);
            }
        }
        
        elseif ($data['action'] === "register") {
            $username = $data['username'];
            $email = $data['email'];
            $password = password_hash($data['password'], PASSWORD_DEFAULT);

            $checkstmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
            $checkstmt->execute([$email]);

            if ($checkstmt->fetch(PDO::FETCH_ASSOC)) {
                echo json_encode(["error" => "User already registered"]);
            } else {
                $stmt = $pdo->prepare("INSERT INTO users (username, email, password, is_active) VALUES (?, ?, ?, ?)");
                $stmt->execute([$username, $email, $password, "0"]);
                echo json_encode(["message" => "Registration successful"]);
            }
        } else {
            echo json_encode(["error" => "Invalid action"]);
        }
    } else {
        echo json_encode(["error" => "Invalid request method"]);
    }

?>

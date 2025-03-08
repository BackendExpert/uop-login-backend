<?php

    include "../config.php";
    require '../vendor/autoload.php';    
    use Firebase\JWT\JWT;
    use Firebase\JWT\Key;

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $data = json_decode(file_get_contents("php://input"), true);
        $email = $data['email'];
        $password = password_hash($data['password'], PASSWORD_DEFAULT);

        $checkstmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $checkstmt->execute([$email]);
        $user = $checkstmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $payload = [
                'email' => $user['email'],
                'exp' => time() + (60 * 60)
            ];
            $token = JWT::encode($payload, $secret_key, 'HS256');
            echo json_encode(["message" => "Login successful", "token" => $token]);
        }
        else{
            echo json_encode(["error" => "User Cannot Find..."]);
        }
    }
    else{
        echo json_encode(["error" => "Check Request Method Please..."]);
    }

?>

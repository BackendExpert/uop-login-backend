<?php

    include "../config.php";
    require 'vendor/autoload.php';    
    use Firebase\JWT\JWT;
    use Firebase\JWT\Key;

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $data = json_decode(file_get_contents("php://input"), true);
        $email = $data['email'];
        $password = password_hash($data['password'], PASSWORD_DEFAULT);

        $checkstmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $checkstmt->execute([$email]);

        if($checkstmt){
            
        }
        else{
            echo json_encode(["error" => "User Cannot Find..."]);
        }
    }
    else{
        echo json_encode(["error" => "Check Request Method Please..."]);
    }

?>
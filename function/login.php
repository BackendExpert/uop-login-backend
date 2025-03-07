<?php 
    include "../config.php";

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $data = json_decode(file_get_contents("php://input"), true);
        $username = $data['username'];
        $email = $data['email'];
        $password = password_hash($data['password'], PASSWORD_DEFAULT);

        $checkstmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $checkstmt->execute([$email]);

        $checkuser = $checkstmt->fetch(PDO::FETCH_ASSOC);
        
        if($checkuser){
            echo json_encode(["error" => "User Already Registerd"]);
        }
        else{
            $stmt = $pdo->prepare("INSERT INTO users (username, email, password, is_active) VALUES (?, ?, ?, ?)");
            $stmt->execute([$username, $email, $password, "0"]);
            echo json_encode(["message" => "Registration successful"]);
        }
    }
    else{
        echo json_encode(["error" => "Check Request Method Please..."]);
    }

?>
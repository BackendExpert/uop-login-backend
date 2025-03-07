<?php
    include "../config.php";
    require 'vendor/autoload.php';    
    use Firebase\JWT\JWT;
    use Firebase\JWT\Key;

    if($_SERVER["REQUEST_METHOD"] === "POST"){

    }
    else{
        echo json_encode(["error" => "Check Request Method Please..."]);
    }


?>
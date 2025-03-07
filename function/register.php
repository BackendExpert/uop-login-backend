<?php
    include "../config.php";

    

    if($_SERVER["REQUEST_METHOD"] === "POST"){

    }
    else{
        echo json_encode(["error" => "Check Request Method Please..."]);
    }


?>
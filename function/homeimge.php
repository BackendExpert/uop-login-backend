<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: Content-Type");
    header("Access-Control-Allow-Methods: POST, GET");
    header("Content-Type: application/json");

    include "../config.php";

    // Enable error reporting
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    // Handle POST requests
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!isset($_POST['action'])) {
            echo json_encode(["error" => "Action not specified"]);
            exit;
        }

        if ($_POST['action'] === "createHomeImage") {
            $imgtitle = $_POST['hititile'] ?? '';
            $imgdesc = $_POST['hidesc'] ?? '';
            $imglink = $_POST['hilink'] ?? '';

            $target_file = "";
            if (!empty($_FILES['hiimg']['name'])) {
                $target_dir = "uploads/";
                if (!is_dir($target_dir)) {
                    mkdir($target_dir, 0777, true);
                }
                $target_file = $target_dir . basename($_FILES["hiimg"]["name"]);
                if (!move_uploaded_file($_FILES["hiimg"]["tmp_name"], $target_file)) {
                    echo json_encode(["error" => "Image upload failed"]);
                    exit;
                }
            }

            $check_stmt = $pdo->prepare("SELECT * FROM home_slider_img");
            $check_stmt->execute();

            $count_rows = $check_stmt->rowCount();

            if($count_rows >= 7){
                echo json_encode(["error" => "Cannot add more Images (only 7 can Add)"]);
            }


            $imgstmt = $pdo->prepare("INSERT INTO home_slider_img(img, title, imgdesc, link)
            VALUES (?, ?, ?, ?)");

            if ($imgstmt->execute([$target_file, $imgtitle, $imgdesc, $imglink])) {
                echo json_encode(["Status" => "Success"]);
            } else {
                $errorInfo = $eventstmt->errorInfo();
                echo json_encode(["error" => "Internal Server Error while Creating Events", "details" => $errorInfo]);
            }

        }
    }

    // Handle GET requests
    elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (!isset($_GET['action'])) {
            echo json_encode(["error" => "Action not specified"]);
            exit;
        }

        if ($_GET['action'] === "getallImages") {
            $getstmt = $pdo->prepare("SELECT * FROM home_slider_img");
            $getstmt->execute();
            $imges = $getstmt->fetchAll(PDO::FETCH_ASSOC);

            if ($imges) {
                echo json_encode(["Status" => "Success", "Result" => $imges]);
            } else {
                echo json_encode(["Status" => "Error", "Result" => []]);
            }
        }
    } else {
        echo json_encode(["error" => "Invalid request method"]);
    }
?>

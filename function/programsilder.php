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

        if ($_POST['action'] === "createPImge") {
            $ptitle = $_POST['ptitle'] ?? '';
            $pdesc = $_POST['pdesc'] ?? '';
            $plink = $_POST['plink'] ?? '';

            $target_file = "";
            if (!empty($_FILES['pimg']['name'])) {
                $target_dir = "uploads/";
                if (!is_dir($target_dir)) {
                    mkdir($target_dir, 0777, true);
                }
                $target_file = $target_dir . basename($_FILES["pimg"]["name"]);
                if (!move_uploaded_file($_FILES["pimg"]["tmp_name"], $target_file)) {
                    echo json_encode(["error" => "Image upload failed"]);
                    exit;
                }
            }

            $imgstmt = $pdo->prepare("INSERT INTO program_slider(title, pdesc, img, link)
            VALUES (?, ?, ?, ?)");

            if ($imgstmt->execute([$ptitle, $pdesc, $target_file, $plink])) {
                echo json_encode(["Status" => "Success"]);
            } else {
                $errorInfo = $eventstmt->errorInfo();
                echo json_encode(["error" => "Internal Server Error while Creating Events", "details" => $errorInfo]);
            }

        }

        if ($_POST['action'] === "deleteimg") {
            $imgId = $_POST['Imgeid'] ?? '';

            $stmt = $pdo->prepare("SELECT img FROM program_slider WHERE id = ?");
            $stmt->execute([$imgId]);
            $image = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if (!$image) {
                echo json_encode(["error" => "Image not found"]);
                exit;
            }

            if (!empty($image['img']) && file_exists($image['img'])) {
                unlink($image['img']); 
            }

            $deleteStmt = $pdo->prepare("DELETE FROM program_slider WHERE id = ?");
            if ($deleteStmt->execute([$imgId])) {
                echo json_encode(["Status" => "Success"]);
            } else {
                echo json_encode(["error" => "Failed to delete image from database"]);
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
            $getstmt = $pdo->prepare("SELECT * FROM program_slider");
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

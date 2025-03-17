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
            else{
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

        if ($_POST['action'] === "deleteimg") {
            $imgId = $_POST['Imgeid'] ?? '';

            $stmt = $pdo->prepare("SELECT img FROM home_slider_img WHERE id = ?");
            $stmt->execute([$imgId]);
            $image = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if (!$image) {
                echo json_encode(["error" => "Image not found"]);
                exit;
            }

            if (!empty($image['img']) && file_exists($image['img'])) {
                unlink($image['img']); 
            }

            $deleteStmt = $pdo->prepare("DELETE FROM home_slider_img WHERE id = ?");
            if ($deleteStmt->execute([$imgId])) {
                echo json_encode(["Status" => "Success"]);
            } else {
                echo json_encode(["error" => "Failed to delete image from database"]);
            }
        }

        if ($_POST['action'] === "updatehImge") {
            if (empty($_POST['title']) && empty($_POST['desc']) && empty($_POST['link']) && empty($_FILES['img']['name'])) {
                echo json_encode(["error" => "At least one field is required to update"]);
                exit;
            }
            $Himge = $_POST['hImgeID'];

            $newsName = $_POST['title'] ?? '';
            $newsDesc = $_POST['desc'] ?? '';
            $newsLink = $_POST['link'] ?? '';

            $target_file = "";
            if (!empty($_FILES['img']['name'])) {
                $target_dir = "uploads/";
                if (!is_dir($target_dir)) {
                    mkdir($target_dir, 0777, true);
                }
                $target_file = $target_dir . basename($_FILES["img"]["name"]);
                if (!move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                    echo json_encode(["error" => "Image upload failed"]);
                    exit;
                }
            }

            $updateQuery = "UPDATE home_slider_img SET ";
            $params = [];
        

            if ($newsName) {
                $updateQuery .= "title = ?, ";
                $params[] = $newsName;
            }
        
            if ($newsDesc) {
                $updateQuery .= "imgdesc = ?, ";
                $params[] = $newsDesc;
            }
        
            if ($newsLink) {
                $updateQuery .= "link = ?, ";
                $params[] = $newsLink;
            }
        
       
            if ($target_file) {
                $updateQuery .= "img = ?, ";
                $params[] = $target_file;
            }

            $updateQuery = rtrim($updateQuery, ', ') . " WHERE id = ?";
            $params[] = $Himge; 

            $stmt = $pdo->prepare($updateQuery);

            if($stmt->execute($params)){
                echo json_encode(["Status" => "Success"]);
            }
            else{
                echo json_encode(["error" => "Internal Server Error while updating event"]);
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

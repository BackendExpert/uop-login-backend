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

        if ($_POST['action'] === "createNEWS") {
            $newsName = $_POST['newsName'] ?? '';
            $newsDesc = $_POST['newsDesc'] ?? '';
            $newsLink = $_POST['newsLink'] ?? '';
            $newsDate = $_POST['newsDate'] ?? '';

            $target_file = "";
            if (!empty($_FILES['newsImg']['name'])) {
                $target_dir = "uploads/";
                if (!is_dir($target_dir)) {
                    mkdir($target_dir, 0777, true);
                }
                $target_file = $target_dir . basename($_FILES["newsImg"]["name"]);
                if (!move_uploaded_file($_FILES["newsImg"]["tmp_name"], $target_file)) {
                    echo json_encode(["error" => "Image upload failed"]);
                    exit;
                }
            }

            $newststmt = $pdo->prepare("INSERT INTO news(news_title, news_desc, news_link, news_img, news_date)
            VALUES (?, ?, ?, ?, ?)");

            if ($newststmt->execute([$newsName, $newsDesc, $newsLink, $target_file, $newsDate])) {
                echo json_encode(["Status" => "Success"]);
            } else {
                $errorInfo = $newststmt->errorInfo();
                echo json_encode(["error" => "Internal Server Error while Creating NEWS", "details" => $errorInfo]);
            }
        }

        if ($_POST['action'] === "updateNEWS") {
            if (empty($_POST['newsName']) && empty($_POST['newsDesc']) && empty($_POST['newsLink']) && empty($_POST['newsDate']) && empty($_FILES['newsImg']['name'])) {
                echo json_encode(["error" => "At least one field is required to update"]);
                exit;
            }
            $newsID = $_POST['NEWSid'];

            $newsName = $_POST['newsName'] ?? '';
            $newsDesc = $_POST['newsDesc'] ?? '';
            $newsLink = $_POST['newsLink'] ?? '';
            $newsDate = $_POST['newsDate'] ?? '';

            $target_file = "";
            if (!empty($_FILES['newsImg']['name'])) {
                $target_dir = "uploads/";
                if (!is_dir($target_dir)) {
                    mkdir($target_dir, 0777, true);
                }
                $target_file = $target_dir . basename($_FILES["newsImg"]["name"]);
                if (!move_uploaded_file($_FILES["newsImg"]["tmp_name"], $target_file)) {
                    echo json_encode(["error" => "Image upload failed"]);
                    exit;
                }
            }

            $updateQuery = "UPDATE news SET ";
            $params = [];
        

            if ($newsName) {
                $updateQuery .= "news_title = ?, ";
                $params[] = $newsName;
            }
        
            if ($newsDesc) {
                $updateQuery .= "news_desc = ?, ";
                $params[] = $newsDesc;
            }
        
            if ($newsLink) {
                $updateQuery .= "news_link = ?, ";
                $params[] = $newsLink;
            }
        
            if ($newsDate) {
                $updateQuery .= "news_date = ?, ";
                $params[] = $newsDate;
            }
        
            if ($target_file) {
                $updateQuery .= "news_img = ?, ";
                $params[] = $target_file;
            }

            $updateQuery = rtrim($updateQuery, ', ') . " WHERE id = ?";
            $params[] = $newsID; 

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

        if ($_GET['action'] === "getallNEWS") {
            $getstmt = $pdo->prepare("SELECT * FROM news");
            $getstmt->execute();
            $news = $getstmt->fetchAll(PDO::FETCH_ASSOC);

            if ($news) {
                echo json_encode(["Status" => "Success", "Result" => $news]);
            } else {
                echo json_encode(["Status" => "Error", "Result" => []]);
            }
        }
    } else {
        echo json_encode(["error" => "Invalid request method"]);
    }
?>

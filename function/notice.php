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

        if ($_POST['action'] === "createnotice") {
            $noticeName = $_POST['noticeName'] ?? '';
            $noticeDesc = $_POST['noticeDesc'] ?? '';
            $noticeLink = $_POST['noticeLink'] ?? '';
            $noticeDate = $_POST['noticeDate'] ?? '';

            $newststmt = $pdo->prepare("INSERT INTO notice(notice_title, notice_desc, notice_link, notice_date)
            VALUES (?, ?, ?, ?)");

            if ($newststmt->execute([$noticeName, $noticeDesc, $noticeLink, $noticeDate])) {
                echo json_encode(["Status" => "Success"]);
            } else {
                $errorInfo = $newststmt->errorInfo();
                echo json_encode(["error" => "Internal Server Error while Creating NEWS", "details" => $errorInfo]);
            }
        }

        if ($_POST['action'] === "updateNotice") {
            if (empty($_POST['noticeName']) && empty($_POST['noticeDesc']) && empty($_POST['noticeLink']) && empty($_POST['noticeDate'])) {
                echo json_encode(["error" => "At least one field is required to update"]);
                exit;
            }
            $noticeID = $_POST['NoticeID'];

            $noticeName = $_POST['noticeName'] ?? '';
            $noticeDesc = $_POST['noticeDesc'] ?? '';
            $noticeLink = $_POST['noticeLink'] ?? '';
            $noticeDate = $_POST['noticeDate'] ?? '';


            $updateQuery = "UPDATE notice SET ";
            $params = [];
        

            if ($noticeName) {
                $updateQuery .= "notice_title = ?, ";
                $params[] = $noticeName;
            }
        
            if ($noticeDesc) {
                $updateQuery .= "notice_desc = ?, ";
                $params[] = $noticeDesc;
            }
        
            if ($noticeLink) {
                $updateQuery .= "notice_link = ?, ";
                $params[] = $noticeLink;
            }
        
            if ($noticeDate) {
                $updateQuery .= "notice_date = ?, ";
                $params[] = $noticeDate;
            }
        

            $updateQuery = rtrim($updateQuery, ', ') . " WHERE notice_id = ?";
            $params[] = $noticeID; 

            $stmt = $pdo->prepare($updateQuery);

            if($stmt->execute($params)){
                echo json_encode(["Status" => "Success"]);
            }
            else{
                echo json_encode(["error" => "Internal Server Error while updating event"]);
            }
        }   
        
        if ($_POST['action'] === "deletenotice") {
            $imgId = $_POST['Imgeid'] ?? '';

            $stmt = $pdo->prepare("SELECT * FROM notice WHERE notice_id = ?");
            $stmt->execute([$imgId]);
            $image = $stmt->fetch(PDO::FETCH_ASSOC);
    

            $deleteStmt = $pdo->prepare("DELETE FROM notice WHERE notice_id = ?");
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

        if ($_GET['action'] === "getallNotice") {
            $getstmt = $pdo->prepare("SELECT * FROM notice");
            $getstmt->execute();
            $notice = $getstmt->fetchAll(PDO::FETCH_ASSOC);

            if ($notice) {
                echo json_encode(["Status" => "Success", "Result" => $notice]);
            } else {
                echo json_encode(["Status" => "Error", "Result" => []]);
            }
        }
    } else {
        echo json_encode(["error" => "Invalid request method"]);
    }
?>

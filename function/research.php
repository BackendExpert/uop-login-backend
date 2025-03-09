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

        if ($_POST['action'] === "createResearch") {
            $resName = $_POST['resName'] ?? '';
            $resDesc = $_POST['resDesc'] ?? '';
            $resLink = $_POST['resLink'] ?? '';
            $resFaculty = $_POST['resFaculty'] ?? '';

            $target_file = "";
            if (!empty($_FILES['resImg']['name'])) {
                $target_dir = "uploads/";
                if (!is_dir($target_dir)) {
                    mkdir($target_dir, 0777, true);
                }
                $target_file = $target_dir . basename($_FILES["resImg"]["name"]);
                if (!move_uploaded_file($_FILES["resImg"]["tmp_name"], $target_file)) {
                    echo json_encode(["error" => "Image upload failed"]);
                    exit;
                }
            }

            $newststmt = $pdo->prepare("INSERT INTO research(res_titile, res_desc, res_link, res_img, res_faculty)
            VALUES (?, ?, ?, ?, ?)");

            if ($newststmt->execute([$resName, $resDesc, $resLink, $target_file, $resFaculty])) {
                echo json_encode(["Status" => "Success"]);
            } else {
                $errorInfo = $newststmt->errorInfo();
                echo json_encode(["error" => "Internal Server Error while Creating NEWS", "details" => $errorInfo]);
            }
        }

        if ($_POST['action'] === "updateResearch") {
            if (empty($_POST['resName']) && empty($_POST['resDesc']) && empty($_POST['resLink']) && empty($_POST['resFaculty']) && empty($_FILES['resImg']['name'])) {
                echo json_encode(["error" => "At least one field is required to update"]);
                exit;
            }
            $resID = $_POST['ResID'];

            $resName = $_POST['resName'] ?? '';
            $resDesc = $_POST['resDesc'] ?? '';
            $resLink = $_POST['resLink'] ?? '';
            $resFaculty = $_POST['resFaculty'] ?? '';

            $target_file = "";
            if (!empty($_FILES['resImg']['name'])) {
                $target_dir = "uploads/";
                if (!is_dir($target_dir)) {
                    mkdir($target_dir, 0777, true);
                }
                $target_file = $target_dir . basename($_FILES["resImg"]["name"]);
                if (!move_uploaded_file($_FILES["resImg"]["tmp_name"], $target_file)) {
                    echo json_encode(["error" => "Image upload failed"]);
                    exit;
                }
            }

            $updateQuery = "UPDATE research SET ";
            $params = [];
        

            if ($resName) {
                $updateQuery .= "res_titile = ?, ";
                $params[] = $resName;
            }
        
            if ($resDesc) {
                $updateQuery .= "res_desc = ?, ";
                $params[] = $resDesc;
            }
        
            if ($resLink) {
                $updateQuery .= "res_link = ?, ";
                $params[] = $resLink;
            }
        
            if ($resFaculty) {
                $updateQuery .= "res_faculty = ?, ";
                $params[] = $resFaculty;
            }
        
            if ($target_file) {
                $updateQuery .= "res_img = ?, ";
                $params[] = $target_file;
            }

            $updateQuery = rtrim($updateQuery, ', ') . " WHERE research_id = ?";
            $params[] = $resID; 

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

        if ($_GET['action'] === "getResearch") {
            $getstmt = $pdo->prepare("SELECT * FROM research");
            $getstmt->execute();
            $research = $getstmt->fetchAll(PDO::FETCH_ASSOC);

            if ($research) {
                echo json_encode(["Status" => "Success", "Result" => $research]);
            } else {
                echo json_encode(["Status" => "Error", "Result" => []]);
            }
        }
    } else {
        echo json_encode(["error" => "Invalid request method"]);
    }
?>

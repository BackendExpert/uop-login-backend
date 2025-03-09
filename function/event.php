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

        if ($_POST['action'] === "createEvent") {
            $eventName = $_POST['eventName'] ?? '';
            $eventDesc = $_POST['eventDesc'] ?? '';
            $eventLink = $_POST['eventLink'] ?? '';
            $eventDate = $_POST['eventDate'] ?? '';

            $target_file = "";
            if (!empty($_FILES['eventImg']['name'])) {
                $target_dir = "uploads/";
                if (!is_dir($target_dir)) {
                    mkdir($target_dir, 0777, true);
                }
                $target_file = $target_dir . basename($_FILES["eventImg"]["name"]);
                if (!move_uploaded_file($_FILES["eventImg"]["tmp_name"], $target_file)) {
                    echo json_encode(["error" => "Image upload failed"]);
                    exit;
                }
            }

            $eventstmt = $pdo->prepare("INSERT INTO events(event_title, event_date, envet_desc, event_link, event_img)
            VALUES (?, ?, ?, ?, ?)");

            if ($eventstmt->execute([$eventName, $eventDate, $eventDesc, $eventLink, $target_file])) {
                echo json_encode(["Status" => "Success"]);
            } else {
                $errorInfo = $eventstmt->errorInfo();
                echo json_encode(["error" => "Internal Server Error while Creating Events", "details" => $errorInfo]);
            }
        }

        if ($_POST['action'] === "updateEvent") {
            if (empty($_POST['eventName']) && empty($_POST['eventDesc']) && empty($_POST['eventLink']) && empty($_POST['eventDate']) && empty($_FILES['eventImg']['name'])) {
                echo json_encode(["error" => "At least one field is required to update"]);
                exit;
            }
            $eventId = $_POST['eventID'];

            $eventName = $_POST['eventName'] ?? '';
            $eventDesc = $_POST['eventDesc'] ?? '';
            $eventLink = $_POST['eventLink'] ?? '';
            $eventDate = $_POST['eventDate'] ?? '';

            $target_file = "";
            if (!empty($_FILES['eventImg']['name'])) {
                $target_dir = "uploads/";
                if (!is_dir($target_dir)) {
                    mkdir($target_dir, 0777, true);
                }
                $target_file = $target_dir . basename($_FILES["eventImg"]["name"]);
                if (!move_uploaded_file($_FILES["eventImg"]["tmp_name"], $target_file)) {
                    echo json_encode(["error" => "Image upload failed"]);
                    exit;
                }
            }

            $updateQuery = "UPDATE events SET ";
            $params = [];
        

            if ($eventName) {
                $updateQuery .= "event_title = ?, ";
                $params[] = $eventName;
            }
        
            if ($eventDesc) {
                $updateQuery .= "envet_desc = ?, ";
                $params[] = $eventDesc;
            }
        
            if ($eventLink) {
                $updateQuery .= "event_link = ?, ";
                $params[] = $eventLink;
            }
        
            if ($eventDate) {
                $updateQuery .= "event_date = ?, ";
                $params[] = $eventDate;
            }
        
            if ($target_file) {
                $updateQuery .= "event_img = ?, ";
                $params[] = $target_file;
            }

            $updateQuery = rtrim($updateQuery, ', ') . " WHERE event_id = ?";
            $params[] = $eventId; 

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

        if ($_GET['action'] === "getallEvents") {
            $getstmt = $pdo->prepare("SELECT * FROM events");
            $getstmt->execute();
            $events = $getstmt->fetchAll(PDO::FETCH_ASSOC);

            if ($events) {
                echo json_encode(["Status" => "Success", "Result" => $events]);
            } else {
                echo json_encode(["Status" => "Error", "Result" => []]);
            }
        }
    } else {
        echo json_encode(["error" => "Invalid request method"]);
    }
?>

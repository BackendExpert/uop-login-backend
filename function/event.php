<?php 
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: Content-Type");
    header("Access-Control-Allow-Methods: POST");

    include "../config.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents("php://input"), true);

        if (!isset($data['action'])) {
            echo json_encode(["error" => "Action not specified"]);
            exit;
        }

        if ($data['action'] === "createEvent") {
            $eventName = $_POST['eventName'];
            $eventDesc = $_POST['eventDesc'];
            $eventLink = $_POST['eventLink'];
            $eventDate = $_POST['eventDate'];

            if (!empty($_FILES['eventImg']['name'])) {
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["eventImg"]["name"]);
                move_uploaded_file($_FILES["eventImg"]["tmp_name"], $target_file);
            } else {
                $target_file = "";
            }


            $eventstmt = $pdo->prepare("INSERT INTO events(event_title, event_date, envet_desc, event_link, event_img)
                                        VALUES (?, ?, ?, ?, ?)");

            if($eventstmt->execute([$eventName, $eventDate, $eventDesc, $eventLink, $target_file ])){
                echo json_encode(["message" => "Registration successful", "Status" => "Success"]);
            }
            else{
                echo json_encode(["error" => "Internal Server Error white Creating Events"]);
            }
        }

    }
    else{
        echo json_encode(["error" => "Invalid request method"]);
    }


?>
<?php
// Include necessary files and initialize session if needed
session_start();
include("shift.php");
include_once("config.php");
include("databaseConnection.php");
$db = new DatabaseConnection(HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];
    $shift_id = $_POST['id'];
    // Handle different actions
    switch ($action) {
        case 'createShift':
            $shift = new Shift();
            $state = $shift->getState();
            $user_id = $_SESSION['userid'];
            header('Content-Type: application/json');
            echo json_encode(['success' => true, 'message' => "new shift with state $state. \n curent user id is $user_id. \n shift id is $id "]);
            break;
        case 'assignShift':
            // Handle assigning a shift
            break;
        // Add more cases as needed
        case 'unassignShift':
            // Handle assigning a shift
            break;
        case 'submitShift':
            $startTime = $_POST['start_time'];
            $endTime = $_POST['end_time'];
            $user_id = $_SESSION['userid'];
            $sql = "INSERT INTO `shift` (`id`, `user_id`, `start_time`, `end_time`) VALUES (NULL, ?, ?, ?)";
            $db->query($sql, [$user_id, $startTime, $endTime]);
            // Return appropriate JSON response
            header('Content-Type: application/json');
            echo json_encode(['success' => true, 'message' => "shift added to database"]);
        case 'getShifts';
            $sql = "SELECT t1.id, t1.user_id, username, start_time, end_time from shift t1 left join users t2 on t1.user_id = t2.id";
            $result = $db->query($sql);
            $row = $result->fetch_all();
            header('Content-Type: application/json');
            echo json_encode(['success' => True, 'message' => $row]);
    }
    exit;
}
?>

<?php
// q24_check_api.php - Checks username availability
header('Content-Type: application/json');

$existingUsers = ['admin', 'kush', 'ramanujan', 'teacher', 'student'];
$u = strtolower(trim($_GET['username'] ?? ''));

if ($u === '') {
    echo json_encode(['available' => false, 'message' => 'Username cannot be empty.']);
} elseif (strlen($u) < 3) {
    echo json_encode(['available' => false, 'message' => 'Username too short (min 3 chars).']);
} elseif (in_array($u, $existingUsers, true)) {
    echo json_encode(['available' => false, 'message' => 'Username is already taken!']);
} else {
    echo json_encode(['available' => true, 'message' => 'Username is available!']);
}

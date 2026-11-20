<?php
// q25_receiver.php - Decodes JSON payload received via POST
header('Content-Type: application/json');

// Read raw JSON body from php://input
$rawInput = file_get_contents('php://input');
$decoded = json_decode($rawInput, true); // true converts to associative array

if ($decoded === null) {
    echo json_encode(['success' => false, 'error' => 'Invalid JSON received']);
    exit;
}

// Return confirmation with decoded details
echo json_encode([
    'success'      => true,
    'message'      => 'JSON decoded successfully on the server via json_decode()!',
    'decoded_data' => $decoded,
    'timestamp'    => date('Y-m-d H:i:s')
]);

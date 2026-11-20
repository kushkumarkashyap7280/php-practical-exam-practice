<?php
// q23_search_api.php - Returns matching names as JSON
header('Content-Type: application/json');

$students = [
    ['roll' => '240201', 'name' => 'Kush Kumar', 'course' => 'B.Voc. SD'],
    ['roll' => '240202', 'name' => 'Aakash Rao', 'course' => 'B.Sc. CS'],
    ['roll' => '240203', 'name' => 'Priya Sharma', 'course' => 'B.Com (H)'],
    ['roll' => '240204', 'name' => 'Deepak Verma', 'course' => 'B.Sc. Maths'],
    ['roll' => '240205', 'name' => 'Sneha Kapoor', 'course' => 'B.Voc. SD'],
    ['roll' => '240206', 'name' => 'Rahul Singhania', 'course' => 'B.Sc. CS'],
    ['roll' => '240207', 'name' => 'Meera Nambiar', 'course' => 'B.Com (H)']
];

$q = strtolower(trim($_GET['q'] ?? ''));
$matches = [];

if ($q !== '') {
    foreach ($students as $s) {
        if (str_contains(strtolower($s['name']), $q) || str_contains($s['roll'], $q)) {
            $matches[] = $s;
        }
    }
} else {
    $matches = $students;
}

echo json_encode($matches);

<?php
require_once __DIR__ . '/db_helper.php';
$db = getDBConnection();
$msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $roll   = trim($_POST['roll'] ?? '');
    $name   = trim($_POST['name'] ?? '');
    $course = trim($_POST['course'] ?? '');
    $marks  = trim($_POST['marks'] ?? '');

    if ($roll && $name && $course && is_numeric($marks)) {
        try {
            $stmt = $db->prepare("INSERT INTO students (roll, name, course, marks) VALUES (?, ?, ?, ?)");
            $stmt->execute([$roll, $name, $course, (float)$marks]);
            $msg = '<div class="alert alert-success">Student record added successfully!</div>';
        } catch (Exception $e) {
            $msg = '<div class="alert alert-danger">Error: Roll number may already exist.</div>';
        }
    } else {
        $msg = '<div class="alert alert-danger">Please fill all fields with valid data.</div>';
    }
}

$students = $db->query("SELECT * FROM students ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question 16: Students CRUD (Insert &amp; Display)</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; background: #f7f9fa; margin: 0; padding: 30px 15px; color: #222; }
        .card { max-width: 600px; margin: 0 auto; background: #fff; padding: 25px 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.08); border: 1px solid #e1e4e8; }
        h2 { margin-top: 0; color: #800000; font-size: 20px; border-bottom: 2px solid #800000; padding-bottom: 8px; }
        .subtitle { font-size: 13px; color: #666; margin-bottom: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; font-weight: 600; margin-bottom: 6px; font-size: 14px; }
        input[type="text"], input[type="number"], input[type="email"], input[type="password"], select, textarea {
            width: 100%; box-sizing: border-box; padding: 9px 12px; border: 1px solid #ccc; border-radius: 4px; font-size: 15px;
        }
        button, .btn { background: #800000; color: #fff; border: none; padding: 9px 18px; font-size: 14px; font-weight: 600; border-radius: 4px; cursor: pointer; text-decoration: none; display: inline-block; }
        button:hover, .btn:hover { background: #600000; }
        .btn-outline { background: transparent; color: #800000; border: 1px solid #800000; }
        .btn-outline:hover { background: #800000; color: #fff; }
        .btn-danger { background: #c5221f; }
        .btn-danger:hover { background: #a51815; }
        .alert { margin-top: 18px; padding: 12px 16px; border-radius: 4px; font-size: 14px; }
        .alert-success { background: #e6f4ea; color: #137333; border: 1px solid #ceead6; }
        .alert-danger { background: #fce8e6; color: #c5221f; border: 1px solid #fad2cf; }
        .alert-info { background: #e8f0fe; color: #1a73e8; border: 1px solid #d2e3fc; }
        .table { width: 100%; border-collapse: collapse; margin-top: 15px; font-size: 14px; }
        .table th, .table td { border: 1px solid #ddd; padding: 8px 10px; text-align: left; }
        .table th { background: #f2f2f2; font-weight: 600; }
        .table tr:nth-child(even) { background: #fafafa; }
        .table tr.fail { background-color: #ffd2d2 !important; color: #900; font-weight: bold; }
        .code-box { margin-top: 22px; background: #202124; color: #e8eaed; padding: 12px 14px; border-radius: 6px; font-family: Consolas, monospace; font-size: 12px; line-height: 1.4; overflow-x: auto; white-space: pre-wrap; }
        .back-link { display: inline-block; margin-top: 18px; font-size: 13px; color: #800000; text-decoration: none; }
        .back-link:hover { text-decoration: underline; }
    </style>
</head>
<body>
<div class="card">
    <h2>Question 16: Students CRUD (Insert &amp; Display)</h2>
    <div class="subtitle">Unit 4: MySQL &bull; GE-5b Advanced Web Programming</div>

    <?= $msg ?>
    <form method="POST">
        <div class="form-group"><label>Roll Number:</label><input type="text" name="roll" required></div>
        <div class="form-group"><label>Student Name:</label><input type="text" name="name" required></div>
        <div class="form-group"><label>Course / Degree:</label><input type="text" name="course" required></div>
        <div class="form-group"><label>Marks:</label><input type="number" step="0.1" name="marks" required></div>
        <button type="submit">Add Student</button>
    </form>

    <h3 style="margin-top:30px;">All Students</h3>
    <table class="table">
        <thead><tr><th>Roll</th><th>Name</th><th>Course</th><th>Marks</th></tr></thead>
        <tbody>
            <?php foreach ($students as $s): ?>
                <tr>
                    <td><?= htmlspecialchars($s['roll']) ?></td>
                    <td><?= htmlspecialchars($s['name']) ?></td>
                    <td><?= htmlspecialchars($s['course']) ?></td>
                    <td><?= $s['marks'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="code-box">
// Pure Function Implementation:
// Prepared Statement Insert:
$stmt = $db->prepare("INSERT INTO students (roll, name, course, marks) VALUES (?, ?, ?, ?)");
$stmt->execute([$roll, $name, $course, $marks]);
    </div>
    <a href="INDEX.md" class="back-link">&larr; Back to Practical Index</a>
</div>
</body>
</html>

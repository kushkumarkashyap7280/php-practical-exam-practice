<?php
require_once __DIR__ . '/db_helper.php';
$db = getDBConnection();

// 1. JOIN query: Students with their department name
$joinStmt = $db->query("
    SELECT s.roll, s.name, s.course, s.marks, d.name AS department_name
    FROM students s
    JOIN departments d ON d.id = s.department_id
    ORDER BY s.id ASC
");
$studentsWithDept = $joinStmt->fetchAll(PDO::FETCH_ASSOC);

// 2. GROUP BY query: Count of students per department
$groupStmt = $db->query("
    SELECT d.name AS department_name, COUNT(s.id) AS student_count, AVG(s.marks) AS avg_marks
    FROM departments d
    LEFT JOIN students s ON s.department_id = d.id
    GROUP BY d.id
");
$departmentCounts = $groupStmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question 19: Relational JOIN and GROUP BY</title>
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
    <h2>Question 19: Relational JOIN and GROUP BY</h2>
    <div class="subtitle">Unit 4: MySQL &bull; GE-5b Advanced Web Programming</div>

    <h3>1. Students with Department Name (JOIN)</h3>
    <table class="table">
        <thead><tr><th>Roll</th><th>Name</th><th>Department</th><th>Marks</th></tr></thead>
        <tbody>
            <?php foreach ($studentsWithDept as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row['roll']) ?></td>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= htmlspecialchars($row['department_name']) ?></td>
                    <td><?= $row['marks'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h3 style="margin-top:30px;">2. Student Count Per Department (GROUP BY)</h3>
    <table class="table">
        <thead><tr><th>Department</th><th>Student Count</th><th>Average Marks</th></tr></thead>
        <tbody>
            <?php foreach ($departmentCounts as $d): ?>
                <tr>
                    <td><strong><?= htmlspecialchars($d['department_name']) ?></strong></td>
                    <td><?= $d['student_count'] ?> students</td>
                    <td><?= round((float)$d['avg_marks'], 2) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="code-box">
// Pure Function Implementation:
// Relational JOIN:
SELECT s.*, d.name FROM students s JOIN departments d ON d.id = s.department_id;
// Aggregation with GROUP BY:
SELECT d.name, COUNT(s.id) FROM departments d LEFT JOIN students s ON s.department_id = d.id GROUP BY d.id;
    </div>
    <a href="INDEX.md" class="back-link">&larr; Back to Practical Index</a>
</div>
</body>
</html>

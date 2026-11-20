<?php
/**
 * University Practical 6: MySQL complete: create table, insert, delete, display rows with JOIN, ORDER BY, GROUP BY.
 */
require_once __DIR__ . '/db_helper.php';
$db = getDBConnection();
$msg = '';

// Delete
if (isset($_GET['del'])) {
    $delId = (int)$_GET['del'];
    $stmt = $db->prepare("DELETE FROM students WHERE id = ?");
    $stmt->execute([$delId]);
    header("Location: uni_06_mysql_full_crud_join_group.php?msg=deleted");
    exit;
}

// Insert
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $roll = trim($_POST['roll'] ?? '');
    $name = trim($_POST['name'] ?? '');
    $course = trim($_POST['course'] ?? '');
    $marks = (float)($_POST['marks'] ?? 0);
    $deptId = (int)($_POST['dept_id'] ?? 1);

    if ($roll && $name) {
        $stmt = $db->prepare("INSERT INTO students (roll, name, course, marks, department_id) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$roll, $name, $course, $marks, $deptId]);
        $msg = '<div class="alert alert-success">Record inserted successfully!</div>';
    }
}

// 1. JOIN + ORDER BY query
$joinRows = $db->query("
    SELECT s.id, s.roll, s.name, s.course, s.marks, d.name AS dept_name
    FROM students s
    JOIN departments d ON d.id = s.department_id
    ORDER BY s.marks DESC
")->fetchAll(PDO::FETCH_ASSOC);

// 2. GROUP BY query
$groupRows = $db->query("
    SELECT d.name AS dept_name, COUNT(s.id) AS total_students, AVG(s.marks) AS avg_marks
    FROM departments d
    LEFT JOIN students s ON s.department_id = d.id
    GROUP BY d.id
")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practical 6: MySQL Table, Insert, Delete, JOIN &amp; GROUP BY</title>
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
        .alert { margin-top: 18px; padding: 12px 16px; border-radius: 4px; font-size: 14px; }
        .alert-success { background: #e6f4ea; color: #137333; border: 1px solid #ceead6; }
        .alert-danger { background: #fce8e6; color: #c5221f; border: 1px solid #fad2cf; }
        .alert-info { background: #e8f0fe; color: #1a73e8; border: 1px solid #d2e3fc; }
        .table { width: 100%; border-collapse: collapse; margin-top: 15px; font-size: 14px; }
        .table th, .table td { border: 1px solid #ddd; padding: 8px 10px; text-align: left; }
        .table th { background: #f2f2f2; font-weight: 600; }
        .code-box { margin-top: 22px; background: #202124; color: #e8eaed; padding: 12px 14px; border-radius: 6px; font-family: Consolas, monospace; font-size: 12px; line-height: 1.4; overflow-x: auto; white-space: pre-wrap; }
        .back-link { display: inline-block; margin-top: 18px; font-size: 13px; color: #800000; text-decoration: none; }
        .back-link:hover { text-decoration: underline; }
    </style>
</head>
<body>
<div class="card">
    <h2>Practical 6: MySQL Table, Insert, Delete, JOIN &amp; GROUP BY</h2>
    <div class="subtitle">DU Syllabus Practical #6 &bull; 10 University Practicals List</div>

    <?= $msg ?>
    <h3>Insert New Student</h3>
    <form method="POST">
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:10px;">
            <div class="form-group"><label>Roll Number:</label><input type="text" name="roll" required></div>
            <div class="form-group"><label>Student Name:</label><input type="text" name="name" required></div>
        </div>
        <div style="display:grid; grid-template-columns:1fr 1fr 1fr; gap:10px;">
            <div class="form-group"><label>Course:</label><input type="text" name="course" required></div>
            <div class="form-group"><label>Marks:</label><input type="number" step="0.1" name="marks" required></div>
            <div class="form-group"><label>Department:</label>
                <select name="dept_id">
                    <option value="1">Computer Science</option>
                    <option value="2">Commerce</option>
                    <option value="3">Mathematics</option>
                </select>
            </div>
        </div>
        <button type="submit">Insert Record</button>
    </form>

    <h3 style="margin-top:30px;">1. All Students with Department (JOIN &amp; ORDER BY marks DESC)</h3>
    <table class="table">
        <thead><tr><th>Roll</th><th>Name</th><th>Dept</th><th>Marks</th><th>Action</th></tr></thead>
        <tbody>
            <?php foreach ($joinRows as $r): ?>
                <tr>
                    <td><?= htmlspecialchars($r['roll']) ?></td>
                    <td><?= htmlspecialchars($r['name']) ?></td>
                    <td><?= htmlspecialchars($r['dept_name']) ?></td>
                    <td><?= $r['marks'] ?></td>
                    <td><a href="uni_06_mysql_full_crud_join_group.php?del=<?= $r['id'] ?>" onclick="return confirm('Delete record?');" style="color:red;">Delete</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h3 style="margin-top:30px;">2. Department Aggregation (GROUP BY)</h3>
    <table class="table">
        <thead><tr><th>Department</th><th>Total Students</th><th>Average Marks</th></tr></thead>
        <tbody>
            <?php foreach ($groupRows as $g): ?>
                <tr>
                    <td><strong><?= htmlspecialchars($g['dept_name']) ?></strong></td>
                    <td><?= $g['total_students'] ?></td>
                    <td><?= round((float)$g['avg_marks'], 2) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="code-box">
// Core Implementation:
// 1. JOIN with ORDER BY:
SELECT s.*, d.name FROM students s JOIN departments d ON d.id = s.department_id ORDER BY s.marks DESC;
// 2. GROUP BY:
SELECT d.name, COUNT(s.id) FROM departments d LEFT JOIN students s ON s.department_id = d.id GROUP BY d.id;
    </div>
    <a href="INDEX.md" class="back-link">&larr; Back to Practical Index</a>
</div>
</body>
</html>

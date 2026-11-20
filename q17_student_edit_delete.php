<?php
require_once __DIR__ . '/db_helper.php';
$db = getDBConnection();
$msg = '';

// Delete
if (isset($_GET['del'])) {
    $delId = (int)$_GET['del'];
    $stmt = $db->prepare("DELETE FROM students WHERE id = ?");
    $stmt->execute([$delId]);
    header("Location: q17_student_edit_delete.php?deleted=1");
    exit;
}

// Edit Save
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_id'])) {
    $id = (int)$_POST['edit_id'];
    $name = trim($_POST['name'] ?? '');
    $marks = (float)($_POST['marks'] ?? 0);
    $stmt = $db->prepare("UPDATE students SET name = ?, marks = ? WHERE id = ?");
    $stmt->execute([$name, $marks, $id]);
    $msg = '<div class="alert alert-success">Student updated successfully!</div>';
}

$editStudent = null;
if (isset($_GET['edit'])) {
    $stmt = $db->prepare("SELECT * FROM students WHERE id = ?");
    $stmt->execute([(int)$_GET['edit']]);
    $editStudent = $stmt->fetch(PDO::FETCH_ASSOC);
}

$students = $db->query("SELECT * FROM students ORDER BY id ASC")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question 17: Edit and Delete with Confirmation</title>
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
    <h2>Question 17: Edit and Delete with Confirmation</h2>
    <div class="subtitle">Unit 4: MySQL &bull; GE-5b Advanced Web Programming</div>

    <?= $msg ?>
    <?php if ($editStudent): ?>
        <h3>Edit Student</h3>
        <form method="POST">
            <input type="hidden" name="edit_id" value="<?= $editStudent['id'] ?>">
            <div class="form-group"><label>Roll: <?= htmlspecialchars($editStudent['roll']) ?></label></div>
            <div class="form-group"><label>Name:</label><input type="text" name="name" value="<?= htmlspecialchars($editStudent['name']) ?>" required></div>
            <div class="form-group"><label>Marks:</label><input type="number" step="0.1" name="marks" value="<?= $editStudent['marks'] ?>" required></div>
            <button type="submit">Save Changes</button>
            <a href="q17_student_edit_delete.php" class="btn btn-outline">Cancel</a>
        </form>
        <hr style="margin:25px 0;">
    <?php endif; ?>

    <table class="table">
        <thead><tr><th>Roll</th><th>Name</th><th>Marks</th><th>Actions</th></tr></thead>
        <tbody>
            <?php foreach ($students as $s): ?>
                <tr>
                    <td><?= htmlspecialchars($s['roll']) ?></td>
                    <td><?= htmlspecialchars($s['name']) ?></td>
                    <td><?= $s['marks'] ?></td>
                    <td>
                        <a href="q17_student_edit_delete.php?edit=<?= $s['id'] ?>">Edit</a> | 
                        <a href="q17_student_edit_delete.php?del=<?= $s['id'] ?>" onclick="return confirm('Are you sure you want to delete <?= htmlspecialchars($s['name']) ?>?');" style="color:red;">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="code-box">
// Pure Function Implementation:
// Delete with parameter binding:
$stmt = $db->prepare("DELETE FROM students WHERE id = ?");
$stmt->execute([$id]);
    </div>
    <a href="INDEX.md" class="back-link">&larr; Back to Practical Index</a>
</div>
</body>
</html>

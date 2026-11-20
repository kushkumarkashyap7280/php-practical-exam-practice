<?php
require_once __DIR__ . '/db_helper.php';
$db = getDBConnection();

$query = trim($_GET['q'] ?? '');
$results = [];

if ($query !== '') {
    $stmt = $db->prepare("SELECT * FROM students WHERE name LIKE ? OR roll LIKE ?");
    $term = "%$query%";
    $stmt->execute([$term, $term]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $results = $db->query("SELECT * FROM students")->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question 18: Student Search (GET + LIKE)</title>
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
    <h2>Question 18: Student Search (GET + LIKE)</h2>
    <div class="subtitle">Unit 4: MySQL &bull; GE-5b Advanced Web Programming</div>

    <form method="GET">
        <div class="form-group">
            <label for="q">Search by Student Name or Roll:</label>
            <input type="text" id="q" name="q" value="<?= htmlspecialchars($query) ?>" placeholder="Type name (e.g. Kush)..." autofocus>
        </div>
        <button type="submit">Search</button>
        <?php if ($query): ?><a href="q18_student_search.php" class="btn btn-outline">Clear</a><?php endif; ?>
    </form>

    <h3 style="margin-top:25px;">Search Results (<?= count($results) ?> found)</h3>
    <table class="table">
        <thead><tr><th>Roll</th><th>Name</th><th>Course</th><th>Marks</th></tr></thead>
        <tbody>
            <?php if (empty($results)): ?>
                <tr><td colspan="4" style="text-align:center; color:#888;">No students match this query.</td></tr>
            <?php else: ?>
                <?php foreach ($results as $s): ?>
                    <tr>
                        <td><?= htmlspecialchars($s['roll']) ?></td>
                        <td><?= htmlspecialchars($s['name']) ?></td>
                        <td><?= htmlspecialchars($s['course']) ?></td>
                        <td><?= $s['marks'] ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

    <div class="code-box">
// Pure Function Implementation:
// Prepared LIKE query:
$stmt = $db->prepare("SELECT * FROM students WHERE name LIKE ?");
$stmt->execute(["%$term%"]);
    </div>
    <a href="INDEX.md" class="back-link">&larr; Back to Practical Index</a>
</div>
</body>
</html>

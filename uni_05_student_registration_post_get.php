<?php
/**
 * University Practical 5: A student registration form using $_POST and $_GET.
 * $_POST is used to submit the sensitive form data.
 * $_GET is used to pass parameters (e.g., ?registered=1&roll=...) for acknowledgement.
 */

// If redirected via GET after successful submission
$registeredRoll = $_GET['roll'] ?? '';
$registeredName = $_GET['name'] ?? '';

$errors = [];
$name = '';
$roll = '';
$course = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $roll = trim($_POST['roll'] ?? '');
    $course = trim($_POST['course'] ?? '');

    if ($name === '') $errors['name'] = 'Name is required.';
    if ($roll === '') $errors['roll'] = 'Roll number is required.';
    if ($course === '') $errors['course'] = 'Please select a course.';

    if (empty($errors)) {
        // Redirect with GET parameters
        $query = http_build_query(['registered' => 1, 'name' => $name, 'roll' => $roll]);
        header("Location: uni_05_student_registration_post_get.php?$query");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practical 5: Registration Form using $_POST &amp; $_GET</title>
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
    <h2>Practical 5: Registration Form using $_POST &amp; $_GET</h2>
    <div class="subtitle">DU Syllabus Practical #5 &bull; 10 University Practicals List</div>

    <?php if (isset($_GET['registered'])): ?>
        <div class="alert alert-success">
            <strong>Student Registered via POST &amp; Redirected with GET:</strong><br>
            Name: <strong><?= htmlspecialchars($registeredName) ?></strong><br>
            Roll No: <strong><?= htmlspecialchars($registeredRoll) ?></strong><br>
            <a href="uni_05_student_registration_post_get.php" style="color:#137333; font-size:12px;">Register another student</a>
        </div>
    <?php endif; ?>

    <form method="POST">
        <div class="form-group">
            <label for="name">Student Name *</label>
            <input type="text" id="name" name="name" value="<?= htmlspecialchars($name) ?>">
            <?php if (isset($errors['name'])): ?><div style="color:red; font-size:12px;"><?= $errors['name'] ?></div><?php endif; ?>
        </div>
        <div class="form-group">
            <label for="roll">Roll Number *</label>
            <input type="text" id="roll" name="roll" value="<?= htmlspecialchars($roll) ?>">
            <?php if (isset($errors['roll'])): ?><div style="color:red; font-size:12px;"><?= $errors['roll'] ?></div><?php endif; ?>
        </div>
        <div class="form-group">
            <label for="course">Course *</label>
            <select id="course" name="course">
                <option value="">-- Select Course --</option>
                <option value="B.Voc. SD" <?= $course === 'B.Voc. SD' ? 'selected' : '' ?>>B.Voc. Software Development</option>
                <option value="B.Sc. (H) CS" <?= $course === 'B.Sc. (H) CS' ? 'selected' : '' ?>>B.Sc. (Hons) Computer Science</option>
                <option value="B.Com (H)" <?= $course === 'B.Com (H)' ? 'selected' : '' ?>>B.Com (Hons)</option>
            </select>
            <?php if (isset($errors['course'])): ?><div style="color:red; font-size:12px;"><?= $errors['course'] ?></div><?php endif; ?>
        </div>
        <button type="submit">Submit Registration (POST)</button>
    </form>

    <div class="code-box">
// Core Implementation:
// Processing POST and passing parameters to GET redirect:
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    header("Location: uni_05_student_registration_post_get.php?registered=1&name=" . urlencode($name));
    exit;
}
$displayName = $_GET['name'] ?? '';
    </div>
    <a href="INDEX.md" class="back-link">&larr; Back to Practical Index</a>
</div>
</body>
</html>

<?php
/**
 * Question 12: Registration form: name, email, mobile (10 digits), password (>= 8 chars).
 * Validate on server and show error next to each field.
 */
function validateRegistration(array $input): array {
    $errors = [];
    $data = [];

    // Name
    $name = trim($input['name'] ?? '');
    if ($name === '') {
        $errors['name'] = 'Name is required.';
    } elseif (strlen($name) < 3) {
        $errors['name'] = 'Name must be at least 3 characters.';
    }
    $data['name'] = $name;

    // Email
    $email = trim($input['email'] ?? '');
    if ($email === '') {
        $errors['email'] = 'Email is required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Enter a valid email address.';
    }
    $data['email'] = $email;

    // Mobile (10 digits starting with 6-9)
    $mobile = trim($input['mobile'] ?? '');
    if ($mobile === '') {
        $errors['mobile'] = 'Mobile number is required.';
    } elseif (!preg_match('/^[6-9][0-9]{9}$/', $mobile)) {
        $errors['mobile'] = 'Enter a valid 10-digit mobile number starting with 6-9.';
    }
    $data['mobile'] = $mobile;

    // Password (at least 8 chars)
    $password = $input['password'] ?? '';
    if (strlen($password) < 8) {
        $errors['password'] = 'Password must be at least 8 characters long.';
    }

    return ['data' => $data, 'errors' => $errors];
}

$errors = [];
$data = ['name' => '', 'email' => '', 'mobile' => ''];
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $val = validateRegistration($_POST);
    $data = $val['data'];
    $errors = $val['errors'];
    if (empty($errors)) {
        $success = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question 12: Registration Form with Validation</title>
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
    <h2>Question 12: Registration Form with Validation</h2>
    <div class="subtitle">Unit 3: Forms, Sessions, Cookies &bull; GE-5b Advanced Web Programming</div>

    <?php if ($success): ?>
        <div class="alert alert-success">
            <strong>Registration Successful!</strong><br>
            Name: <?= htmlspecialchars($data['name']) ?><br>
            Email: <?= htmlspecialchars($data['email']) ?><br>
            Mobile: <?= htmlspecialchars($data['mobile']) ?>
        </div>
    <?php endif; ?>

    <form method="POST">
        <div class="form-group">
            <label for="name">Full Name *</label>
            <input type="text" id="name" name="name" value="<?= htmlspecialchars($data['name']) ?>">
            <?php if (isset($errors['name'])): ?><div style="color:red; font-size:12px; margin-top:4px;"><?= $errors['name'] ?></div><?php endif; ?>
        </div>
        <div class="form-group">
            <label for="email">Email Address *</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($data['email']) ?>">
            <?php if (isset($errors['email'])): ?><div style="color:red; font-size:12px; margin-top:4px;"><?= $errors['email'] ?></div><?php endif; ?>
        </div>
        <div class="form-group">
            <label for="mobile">Mobile Number (10 digits) *</label>
            <input type="text" id="mobile" name="mobile" maxlength="10" value="<?= htmlspecialchars($data['mobile']) ?>">
            <?php if (isset($errors['mobile'])): ?><div style="color:red; font-size:12px; margin-top:4px;"><?= $errors['mobile'] ?></div><?php endif; ?>
        </div>
        <div class="form-group">
            <label for="password">Password (min 8 characters) *</label>
            <input type="password" id="password" name="password">
            <?php if (isset($errors['password'])): ?><div style="color:red; font-size:12px; margin-top:4px;"><?= $errors['password'] ?></div><?php endif; ?>
        </div>
        <button type="submit">Register</button>
    </form>

    <div class="code-box">
// Pure Function Implementation:
// Server-side validation using filter_var() and preg_match():
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors['email'] = 'Invalid email';
if (!preg_match('/^[6-9][0-9]{9}$/', $mobile))  $errors['mobile'] = 'Invalid 10-digit mobile';
if (strlen($password) < 8)                      $errors['password'] = 'Min 8 chars required';
    </div>
    <a href="INDEX.md" class="back-link">&larr; Back to Practical Index</a>
</div>
</body>
</html>

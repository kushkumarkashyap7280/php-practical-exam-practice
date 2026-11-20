<?php
/**
 * Question 13: Login with a session: a login page, welcome page that only opens after login, and a logout button.
 */
session_start();

// Handle Logout
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    $_SESSION = [];
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"]);
    }
    session_destroy();
    header("Location: q13_session_login.php");
    exit;
}

$error = '';
// Handle Login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    // Sample credentials
    if ($username === 'admin' && $password === 'Pass@123') {
        session_regenerate_id(true); // Security: prevent session fixation
        $_SESSION['authenticated_user'] = [
            'username' => 'admin',
            'name'     => 'Kush Kumar',
            'role'     => 'Student (B.Voc. SD)'
        ];
    } else {
        $error = 'Invalid username or password. (Hint: admin / Pass@123)';
    }
}

$isLoggedIn = isset($_SESSION['authenticated_user']);
$currentUser = $_SESSION['authenticated_user'] ?? null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question 13: Session-Based Authentication</title>
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
    <h2>Question 13: Session-Based Authentication</h2>
    <div class="subtitle">Unit 3: Forms, Sessions, Cookies &bull; GE-5b Advanced Web Programming</div>

    <?php if ($isLoggedIn): ?>
        <!-- Protected Welcome Screen -->
        <div class="alert alert-success">
            <h3>Welcome, <?= htmlspecialchars($currentUser['name']) ?>!</h3>
            <p>You have successfully logged in using a secure PHP session.</p>
            <ul>
                <li><strong>Username:</strong> <?= htmlspecialchars($currentUser['username']) ?></li>
                <li><strong>Role:</strong> <?= htmlspecialchars($currentUser['role']) ?></li>
                <li><strong>Session ID:</strong> <code><?= session_id() ?></code></li>
            </ul>
            <a href="q13_session_login.php?action=logout" class="btn btn-danger">Log Out</a>
        </div>
    <?php else: ?>
        <!-- Login Form -->
        <?php if ($error): ?><div class="alert alert-danger"><?= htmlspecialchars($error) ?></div><?php endif; ?>
        <form method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="admin" required autofocus>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Pass@123" required>
            </div>
            <button type="submit">Log In</button>
        </form>
        <p style="font-size:12px; color:#666; margin-top:10px;">Test credentials: <code>admin</code> / <code>Pass@123</code></p>
    <?php endif; ?>

    <div class="code-box">
// Pure Function Implementation:
// Session check:
session_start();
if ($login_successful) {
    session_regenerate_id(true);
    $_SESSION['user'] = $userData;
}
// Logout:
session_destroy();
    </div>
    <a href="INDEX.md" class="back-link">&larr; Back to Practical Index</a>
</div>
</body>
</html>

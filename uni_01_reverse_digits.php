<?php
/**
 * University Practical 1: Reverse the digits of a number.
 */
function reverseDigits(int $num): int {
    $isNegative = $num < 0;
    $num = abs($num);
    $rev = 0;

    while ($num > 0) {
        $digit = $num % 10;
        $rev = ($rev * 10) + $digit;
        $num = (int)($num / 10);
    }

    return $isNegative ? -$rev : $rev;
}

if (php_sapi_name() === 'cli') {
    echo "Reverse of 12345: " . reverseDigits(12345) . "\n";
    echo "Reverse of -9870: " . reverseDigits(-9870) . "\n";
    exit(0);
}

$inputVal = $_POST['num'] ?? '';
$result = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (is_numeric($inputVal)) {
        $rev = reverseDigits((int)$inputVal);
        $result = '<div class="alert alert-success">Original Number: <strong>' . htmlspecialchars($inputVal) . '</strong><br>Reversed Digits: <strong>' . $rev . '</strong></div>';
    } else {
        $result = '<div class="alert alert-danger">Please enter a valid integer.</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practical 1: Reverse Digits of a Number</title>
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
    <h2>Practical 1: Reverse Digits of a Number</h2>
    <div class="subtitle">DU Syllabus Practical #1 &bull; 10 University Practicals List</div>

    <form method="POST">
        <div class="form-group">
            <label for="num">Enter an Integer:</label>
            <input type="number" id="num" name="num" value="<?= htmlspecialchars($inputVal) ?>" placeholder="e.g. 12345, -7890" required autofocus>
        </div>
        <button type="submit">Reverse Digits</button>
    </form>
    <?= $result ?>

    <div class="code-box">
// Core Implementation:
function reverseDigits(int $num): int {
    $isNeg = $num < 0; $num = abs($num); $rev = 0;
    while ($num > 0) {
        $rev = ($rev * 10) + ($num % 10);
        $num = (int)($num / 10);
    }
    return $isNeg ? -$rev : $rev;
}
    </div>
    <a href="INDEX.md" class="back-link">&larr; Back to Practical Index</a>
</div>
</body>
</html>

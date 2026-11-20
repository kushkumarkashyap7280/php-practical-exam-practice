<?php
/**
 * Question 3: Find the largest and smallest of three numbers entered in a form.
 */
function findLargest(float $a, float $b, float $c): float {
    return max($a, $b, $c);
}

function findSmallest(float $a, float $b, float $c): float {
    return min($a, $b, $c);
}

// Algorithmic version without using max()/min() built-ins
function findMinMaxConditional($a, $b, $c): array {
    // Largest
    if ($a >= $b && $a >= $c) $largest = $a;
    elseif ($b >= $a && $b >= $c) $largest = $b;
    else $largest = $c;

    // Smallest
    if ($a <= $b && $a <= $c) $smallest = $a;
    elseif ($b <= $a && $b <= $c) $smallest = $b;
    else $smallest = $c;

    return ['largest' => $largest, 'smallest' => $smallest];
}

if (php_sapi_name() === 'cli') {
    $res = findMinMaxConditional(45, 12, 89);
    echo "Inputs (45, 12, 89) => Largest: " . $res['largest'] . ", Smallest: " . $res['smallest'] . "\n";
    exit(0);
}

$a = $_POST['num1'] ?? '';
$b = $_POST['num2'] ?? '';
$c = $_POST['num3'] ?? '';
$resultHtml = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!is_numeric($a) || !is_numeric($b) || !is_numeric($c)) {
        $resultHtml = '<div class="alert alert-danger">Please enter valid numeric values for all three inputs.</div>';
    } else {
        $stats = findMinMaxConditional((float)$a, (float)$b, (float)$c);
        $resultHtml = '<div class="alert alert-success">' .
                      '<strong>Input Numbers:</strong> ' . htmlspecialchars("$a, $b, $c") . '<br>' .
                      '<strong>Largest Number:</strong> ' . $stats['largest'] . '<br>' .
                      '<strong>Smallest Number:</strong> ' . $stats['smallest'] . '</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question 3: Largest & Smallest of Three Numbers</title>
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
    <h2>Question 3: Largest & Smallest of Three Numbers</h2>
    <div class="subtitle">Unit 1: PHP Basics &bull; GE-5b Advanced Web Programming</div>

    <form method="POST">
        <div class="form-group">
            <label for="num1">First Number:</label>
            <input type="number" step="any" id="num1" name="num1" value="<?= htmlspecialchars($a) ?>" required autofocus>
        </div>
        <div class="form-group">
            <label for="num2">Second Number:</label>
            <input type="number" step="any" id="num2" name="num2" value="<?= htmlspecialchars($b) ?>" required>
        </div>
        <div class="form-group">
            <label for="num3">Third Number:</label>
            <input type="number" step="any" id="num3" name="num3" value="<?= htmlspecialchars($c) ?>" required>
        </div>
        <button type="submit">Evaluate</button>
    </form>
    <?= $resultHtml ?>

    <div class="code-box">
// Pure Function Implementation:
function findMinMaxConditional($a, $b, $c): array {
    $largest = ($a >= $b && $a >= $c) ? $a : (($b >= $a && $b >= $c) ? $b : $c);
    $smallest = ($a <= $b && $a <= $c) ? $a : (($b <= $a && $b <= $c) ? $b : $c);
    return ['largest' => $largest, 'smallest' => $smallest];
}
    </div>
    <a href="INDEX.md" class="back-link">&larr; Back to Practical Index</a>
</div>
</body>
</html>

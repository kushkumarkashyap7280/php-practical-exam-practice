<?php
/**
 * Question 10: Build a page with buttons for strtoupper, strtolower, strrev, str_word_count and str_pad.
 */
function applyStringOperation(string $str, string $operation): string {
    switch ($operation) {
        case 'upper':
            return strtoupper($str);
        case 'lower':
            return strtolower($str);
        case 'reverse':
            return strrev($str);
        case 'word_count':
            return "Word Count: " . str_word_count($str);
        case 'pad':
            return str_pad($str, max(20, strlen($str) + 6), "#", STR_PAD_BOTH);
        default:
            return $str;
    }
}

$inputStr = $_POST['str'] ?? 'Hello World';
$selectedOp = $_POST['op'] ?? '';
$result = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $selectedOp !== '') {
    $result = applyStringOperation($inputStr, $selectedOp);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question 10: String Built-in Operations</title>
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
    <h2>Question 10: String Built-in Operations</h2>
    <div class="subtitle">Unit 2: Strings &bull; GE-5b Advanced Web Programming</div>

    <form method="POST">
        <div class="form-group">
            <label for="str">Input String:</label>
            <input type="text" id="str" name="str" value="<?= htmlspecialchars($inputStr) ?>" required>
        </div>
        <div style="display:flex; flex-wrap:wrap; gap:8px; margin-bottom:15px;">
            <button type="submit" name="op" value="upper">strtoupper()</button>
            <button type="submit" name="op" value="lower">strtolower()</button>
            <button type="submit" name="op" value="reverse">strrev()</button>
            <button type="submit" name="op" value="word_count">str_word_count()</button>
            <button type="submit" name="op" value="pad">str_pad()</button>
        </div>
    </form>

    <?php if ($result !== ''): ?>
        <div class="alert alert-info">
            <strong>Selected Operation:</strong> <code><?= htmlspecialchars($selectedOp) ?></code><br>
            <strong>Result:</strong> <code><?= htmlspecialchars($result) ?></code>
        </div>
    <?php endif; ?>

    <div class="code-box">
// Pure Function Implementation:
function applyStringOperation(string $str, string $operation): string {
    return match ($operation) {
        'upper'      => strtoupper($str),
        'lower'      => strtolower($str),
        'reverse'    => strrev($str),
        'word_count' => "Word count: " . str_word_count($str),
        'pad'        => str_pad($str, strlen($str) + 6, "*", STR_PAD_BOTH),
        default      => $str
    };
}
    </div>
    <a href="INDEX.md" class="back-link">&larr; Back to Practical Index</a>
</div>
</body>
</html>

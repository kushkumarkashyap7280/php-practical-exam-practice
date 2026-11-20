<?php
/**
 * University Practical 3: A string operations page with a button for each operation:
 * strlen, substr, str_replace, trim, is_string, ucwords.
 */
function performStringOp(string $input, string $op): array {
    switch ($op) {
        case 'strlen':
            return ['op' => 'strlen()', 'res' => "String length: " . strlen($input)];
        case 'substr':
            return ['op' => 'substr(0, 10)', 'res' => substr($input, 0, 10) . '...'];
        case 'str_replace':
            return ['op' => 'str_replace("PHP", "JavaScript")', 'res' => str_replace('PHP', 'JavaScript', $input)];
        case 'trim':
            return ['op' => 'trim()', 'res' => "[" . trim($input) . "] (Leading/trailing spaces removed)"];
        case 'is_string':
            return ['op' => 'is_string()', 'res' => is_string($input) ? 'true (It is a valid string)' : 'false'];
        case 'ucwords':
            return ['op' => 'ucwords()', 'res' => ucwords(strtolower($input))];
        default:
            return ['op' => 'none', 'res' => $input];
    }
}

$text = $_POST['str'] ?? '  learning PHP web programming at ramanujan college  ';
$op = $_POST['op'] ?? '';
$output = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $op !== '') {
    $output = performStringOp($text, $op);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practical 3: String Operations Showcase</title>
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
    <h2>Practical 3: String Operations Showcase</h2>
    <div class="subtitle">DU Syllabus Practical #3 &bull; 10 University Practicals List</div>

    <form method="POST">
        <div class="form-group">
            <label for="str">Input Text:</label>
            <input type="text" id="str" name="str" value="<?= htmlspecialchars($text) ?>" required>
        </div>
        <div style="display:flex; flex-wrap:wrap; gap:8px; margin-bottom:15px;">
            <button type="submit" name="op" value="strlen">strlen()</button>
            <button type="submit" name="op" value="substr">substr()</button>
            <button type="submit" name="op" value="str_replace">str_replace()</button>
            <button type="submit" name="op" value="trim">trim()</button>
            <button type="submit" name="op" value="is_string">is_string()</button>
            <button type="submit" name="op" value="ucwords">ucwords()</button>
        </div>
    </form>

    <?php if ($output !== null): ?>
        <div class="alert alert-info">
            <strong>Executed:</strong> <code><?= $output['op'] ?></code><br>
            <strong>Output:</strong> <code><?= htmlspecialchars($output['res']) ?></code>
        </div>
    <?php endif; ?>

    <div class="code-box">
// Core Implementation:
// Built-in String Functions:
strlen($str);                      // String length
substr($str, 0, 5);                // Substring
str_replace('old', 'new', $str);   // Replace occurrences
trim($str);                        // Strip surrounding whitespace
is_string($str);                   // Check if type is string
ucwords($str);                     // Capitalize first letter of every word
    </div>
    <a href="INDEX.md" class="back-link">&larr; Back to Practical Index</a>
</div>
</body>
</html>

<?php
/**
 * Practical Exam Practice — Question 1
 * Aim: Check whether a number is a palindrome, using a user-defined function.
 * Student: Kush Kumar | University Roll No: 24020107032 | College Roll No: 24107035
 */

/**
 * Pure Function: isPalindrome
 * Takes an integer $num and returns true if it is a palindrome, false otherwise.
 * Logic: Extracts digits mathematically using modulo (%) and integer division.
 * 
 * @param int $num
 * @return bool
 */
function isPalindrome(int $num): bool {
    // Negative numbers are not palindromes (e.g. -121 reversed is 121-)
    if ($num < 0) {
        return false;
    }

    $original = $num;
    $reverse = 0;

    while ($num > 0) {
        $digit = $num % 10;
        $reverse = ($reverse * 10) + $digit;
        $num = (int)($num / 10); // Integer cast avoids float division in PHP
    }

    return $original === $reverse;
}

/**
 * Pure Function Alternative: String method using strrev()
 * @param int|string $input
 * @return bool
 */
function isPalindromeString($input): bool {
    $str = (string)$input;
    if (strlen($str) === 0 || $str[0] === '-') {
        return false;
    }
    return $str === strrev($str);
}

// -------------------------------------------------------------------------
// CLI Execution: If run from terminal (e.g. `php q01_palindrome.php`)
// -------------------------------------------------------------------------
if (php_sapi_name() === 'cli') {
    echo "=== Question 1: Check Palindrome (CLI Test) ===\n";
    $testCases = [121, 1331, 12345, 7, -121, 4554, 100];
    foreach ($testCases as $val) {
        $res = isPalindrome($val) ? "PALINDROME" : "NOT A PALINDROME";
        echo "Number: $val => $res\n";
    }
    exit(0);
}

// -------------------------------------------------------------------------
// Web/Browser Execution: Handles POST request with HTML form
// -------------------------------------------------------------------------
$resultHtml = '';
$inputVal = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputVal = trim($_POST['number'] ?? '');

    if ($inputVal === '' || !is_numeric($inputVal)) {
        $resultHtml = '<div class="alert alert-danger">Please enter a valid numeric integer.</div>';
    } else {
        $n = (int)$inputVal;
        if (isPalindrome($n)) {
            $resultHtml = "<div class='alert alert-success'><strong>$n</strong> is a <strong>Palindrome Number</strong>!</div>";
        } else {
            $resultHtml = "<div class='alert alert-danger'><strong>$n</strong> is <strong>NOT</strong> a Palindrome Number.</div>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Q1: Palindrome Number Checker</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; background: #f7f9fa; margin: 0; padding: 40px 20px; }
        .card { max-width: 480px; margin: 0 auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.08); border: 1px solid #e1e4e8; }
        h2 { margin-top: 0; color: #800000; font-size: 22px; border-bottom: 2px solid #800000; padding-bottom: 8px; }
        .subtitle { font-size: 13px; color: #666; margin-bottom: 20px; }
        .form-group { margin-bottom: 18px; }
        label { display: block; font-weight: 600; margin-bottom: 6px; font-size: 14px; }
        input[type="number"], input[type="text"] { width: 100%; box-sizing: border-box; padding: 10px 12px; border: 1px solid #ccc; border-radius: 4px; font-size: 16px; }
        button { background: #800000; color: #fff; border: none; padding: 10px 20px; font-size: 15px; font-weight: 600; border-radius: 4px; cursor: pointer; }
        button:hover { background: #600000; }
        .alert { margin-top: 20px; padding: 12px 16px; border-radius: 4px; font-size: 15px; }
        .alert-success { background: #e6f4ea; color: #137333; border: 1px solid #ceead6; }
        .alert-danger { background: #fce8e6; color: #c5221f; border: 1px solid #fad2cf; }
        .code-box { margin-top: 25px; background: #202124; color: #e8eaed; padding: 14px; border-radius: 6px; font-family: Consolas, monospace; font-size: 12px; line-height: 1.4; overflow-x: auto; }
        .back-link { display: inline-block; margin-top: 18px; font-size: 13px; color: #800000; text-decoration: none; }
        .back-link:hover { text-decoration: underline; }
    </style>
</head>
<body>

<div class="card">
    <h2>Question 1: Palindrome Checker</h2>
    <div class="subtitle">Unit 1: PHP Basics &bull; GE-5b Advanced Web Programming</div>

    <form method="POST" action="">
        <div class="form-group">
            <label for="number">Enter an Integer:</label>
            <input type="number" id="number" name="number" value="<?= htmlspecialchars($inputVal) ?>" placeholder="e.g. 121, 1331, 4554" required autofocus>
        </div>
        <button type="submit">Check Palindrome</button>
    </form>

    <?= $resultHtml ?>

    <div class="code-box">
// Pure function logic:
function isPalindrome(int $num): bool {
    if ($num &lt; 0) return false;
    $original = $num;
    $reverse = 0;
    while ($num &gt; 0) {
        $digit = $num % 10;
        $reverse = ($reverse * 10) + $digit;
        $num = (int)($num / 10);
    }
    return $original === $reverse;
}
    </div>

    <a href="INDEX.md" class="back-link">&larr; Back to Practical Index</a>
</div>

</body>
</html>

<?php
/**
 * Display receiver page for Practical 10
 */
$jsonData = $_POST['json_payload'] ?? '';
$decoded = json_decode($jsonData, true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Practical 10: Displaying Received JSON</title>
    <style>
        body { font-family: sans-serif; background: #f7f9fa; padding: 40px; }
        .card { max-width: 550px; margin: 0 auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h2 { color: #800000; border-bottom: 2px solid #800000; padding-bottom: 8px; margin-top: 0; }
        pre { background: #202124; color: #8ab4f8; padding: 15px; border-radius: 6px; font-family: Consolas, monospace; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background: #f2f2f2; }
    </style>
</head>
<body>
<div class="card">
    <h2>Practical 10: Received JSON Object on Server</h2>
    <div style="font-size:13px; color:#666; margin-bottom:15px;">Received on destination page via HTTP POST</div>

    <?php if ($decoded): ?>
        <h3>Parsed Key-Value Table (via json_decode):</h3>
        <table>
            <thead><tr><th>Field Key</th><th>Value</th></tr></thead>
            <tbody>
                <?php foreach ($decoded as $k => $v): ?>
                    <tr><td><strong><?= htmlspecialchars($k) ?></strong></td><td><?= htmlspecialchars($v) ?></td></tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h3>Raw JSON String Received:</h3>
        <pre><?= htmlspecialchars($jsonData) ?></pre>
    <?php else: ?>
        <p style="color:red;">No valid JSON payload received.</p>
    <?php endif; ?>

    <br><a href="uni_10_form_json_object_transfer.php" style="color:#800000; font-size:13px;">&larr; Back to Form</a>
</div>
</body>
</html>

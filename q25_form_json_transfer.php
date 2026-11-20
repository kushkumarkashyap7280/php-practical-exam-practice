<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Question 25: Form Data to JSON Transfer</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <style>
        body { font-family: sans-serif; background: #f7f9fa; padding: 40px; }
        .card { max-width: 600px; margin: 0 auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h2 { color: #800000; border-bottom: 2px solid #800000; padding-bottom: 8px; margin-top: 0; }
        .form-group { margin-bottom: 12px; }
        label { display: block; font-weight: bold; margin-bottom: 5px; font-size: 14px; }
        input, select { width: 100%; box-sizing: border-box; padding: 8px 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px; }
        button { background: #800000; color: #fff; border: none; padding: 10px 18px; font-weight: bold; border-radius: 4px; cursor: pointer; }
        .output-box { margin-top: 20px; padding: 15px; background: #e8f0fe; border: 1px solid #d2e3fc; border-radius: 6px; font-size: 14px; display: none; }
    </style>
</head>
<body>
<div class="card">
    <h2>Question 25: Serialize Form to JSON &amp; json_decode()</h2>
    <div style="font-size:13px; color:#666; margin-bottom:15px;">Unit 5: jQuery, AJAX, JSON</div>

    <form id="json-form">
        <div class="form-group">
            <label>Student Name:</label>
            <input type="text" name="name" value="Kush Kumar" required>
        </div>
        <div class="form-group">
            <label>Roll Number:</label>
            <input type="text" name="roll" value="24020107032" required>
        </div>
        <div class="form-group">
            <label>Subject / Paper:</label>
            <select name="subject">
                <option value="AWP">Advanced Web Programming (PHP)</option>
                <option value="DSA">Data Structures &amp; Algorithms</option>
                <option value="DBMS">Database Management Systems</option>
            </select>
        </div>
        <div class="form-group">
            <label>Marks:</label>
            <input type="number" name="marks" value="95" required>
        </div>
        <button type="submit">Convert to JSON &amp; Send to PHP</button>
    </form>

    <div id="output" class="output-box"></div>

    <div style="margin-top:25px; background:#202124; color:#e8eaed; padding:12px; border-radius:6px; font-family:Consolas, monospace; font-size:12px;">
// 1. Client serialize to JSON:
var jsonObj = Object.fromEntries(new FormData(this));
// 2. Send via $.ajax:
$.ajax({
    url: 'q25_receiver.php',
    type: 'POST',
    data: JSON.stringify(jsonObj),
    contentType: 'application/json',
    success: function(res) { ... }
});
// 3. Server decode:
$data = json_decode(file_get_contents('php://input'), true);
    </div>
    <br><a href="INDEX.md" style="color:#800000; font-size:13px;">&larr; Back to Practical Index</a>
</div>

<script>
$(document).ready(function() {
    $('#json-form').submit(function(e) {
        e.preventDefault();

        // Convert form fields to JavaScript object
        var unindexed = $(this).serializeArray();
        var indexed = {};
        $.map(unindexed, function(n, i){
            indexed[n['name']] = n['value'];
        });

        // Send JSON string to PHP backend
        $.ajax({
            url: 'q25_receiver.php',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(indexed),
            success: function(response) {
                $('#output').show().html(
                    '<strong>Server Response:</strong> ' + response.message + '<br><br>' +
                    '<strong>Decoded JSON Data from PHP:</strong><pre>' + JSON.stringify(response.decoded_data, null, 2) + '</pre>'
                );
            },
            error: function() {
                alert('Error connecting to q25_receiver.php');
            }
        });
    });
});
</script>
</body>
</html>

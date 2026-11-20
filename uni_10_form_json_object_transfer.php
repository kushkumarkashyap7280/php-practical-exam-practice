<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Practical 10: Form Data to JSON Object</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <style>
        body { font-family: sans-serif; background: #f7f9fa; padding: 40px; }
        .card { max-width: 550px; margin: 0 auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h2 { color: #800000; border-bottom: 2px solid #800000; padding-bottom: 8px; margin-top: 0; }
        .form-group { margin-bottom: 15px; }
        label { display: block; font-weight: bold; margin-bottom: 5px; font-size: 14px; }
        input { width: 100%; box-sizing: border-box; padding: 8px 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px; }
        button { background: #800000; color: #fff; border: none; padding: 10px 18px; font-weight: bold; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>
<div class="card">
    <h2>Practical 10: Convert Form Data to JSON Object</h2>
    <div style="font-size:13px; color:#666; margin-bottom:15px;">DU Syllabus Practical #10 &bull; Passes JSON to destination page</div>

    <form id="input-form">
        <div class="form-group">
            <label>Student Name:</label>
            <input type="text" name="student_name" value="Kush Kumar" required>
        </div>
        <div class="form-group">
            <label>Roll Number:</label>
            <input type="text" name="roll_no" value="24020107032" required>
        </div>
        <div class="form-group">
            <label>College:</label>
            <input type="text" name="college" value="Ramanujan College, DU" required>
        </div>
        <div class="form-group">
            <label>Department:</label>
            <input type="text" name="department" value="Computer Science" required>
        </div>
        <button type="submit">Package to JSON &amp; Submit</button>
    </form>

    <!-- Hidden form that actually sends the JSON payload to another page -->
    <form id="post-transfer-form" method="POST" action="uni_10_display.php" style="display:none;">
        <input type="hidden" name="json_payload" id="json-payload">
    </form>

    <div style="margin-top:25px; background:#202124; color:#e8eaed; padding:12px; border-radius:6px; font-family:Consolas, monospace; font-size:12px;">
// 1. Collect form data into JSON object:
var dataArray = $('#input-form').serializeArray();
var jsonObj = {};
$.each(dataArray, function(i, field) { jsonObj[field.name] = field.value; });

// 2. Put into hidden field and submit to another page:
$('#json-payload').val(JSON.stringify(jsonObj));
$('#post-transfer-form').submit();
    </div>
    <br><a href="INDEX.md" style="color:#800000; font-size:13px;">&larr; Back to Practical Index</a>
</div>

<script>
$(document).ready(function() {
    $('#input-form').submit(function(e) {
        e.preventDefault();

        // 1. Pack inputs into a JSON object using jQuery
        var formArray = $(this).serializeArray();
        var jsonObject = {};
        $.each(formArray, function(i, field) {
            jsonObject[field.name] = field.value;
        });

        // 2. Assign JSON string to hidden form and pass to another page (uni_10_display.php)
        $('#json-payload').val(JSON.stringify(jsonObject));
        $('#post-transfer-form').submit();
    });
});
</script>
</body>
</html>

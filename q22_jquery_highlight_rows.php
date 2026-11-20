<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Question 22: Highlight Fail Rows</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <style>
        body { font-family: sans-serif; background: #f7f9fa; padding: 40px; }
        .card { max-width: 600px; margin: 0 auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h2 { color: #800000; border-bottom: 2px solid #800000; padding-bottom: 8px; margin-top: 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background: #f2f2f2; }
        button { background: #800000; color: #fff; border: none; padding: 10px 18px; font-weight: bold; border-radius: 4px; cursor: pointer; margin-top: 15px; }
    </style>
</head>
<body>
<div class="card">
    <h2>Question 22: Highlight Table Rows (jQuery Selector)</h2>
    <div style="font-size:13px; color:#666; margin-bottom:15px;">Unit 5: jQuery, AJAX, JSON</div>

    <table id="marks-table">
        <thead><tr><th>Roll</th><th>Student Name</th><th>Marks</th><th>Result</th></tr></thead>
        <tbody>
            <tr><td>240201</td><td>Kush Kumar</td><td>95</td><td>Pass</td></tr>
            <tr class="fail"><td>240202</td><td>Aakash Rao</td><td>28</td><td>Fail</td></tr>
            <tr><td>240203</td><td>Priya Sharma</td><td>78</td><td>Pass</td></tr>
            <tr class="fail"><td>240204</td><td>Deepak Verma</td><td>32</td><td>Fail</td></tr>
            <tr><td>240205</td><td>Sneha Kapoor</td><td>65</td><td>Pass</td></tr>
        </tbody>
    </table>

    <button id="btn-highlight">Highlight Fail Rows with jQuery</button>

    <div style="margin-top:25px; background:#202124; color:#e8eaed; padding:12px; border-radius:6px; font-family:Consolas, monospace; font-size:12px;">
$('tr.fail').css({ 'background-color': '#fce8e6', 'color': '#c5221f', 'font-weight': 'bold' });
    </div>
    <br><a href="INDEX.md" style="color:#800000; font-size:13px;">&larr; Back to Practical Index</a>
</div>

<script>
$(document).ready(function() {
    $('#btn-highlight').click(function() {
        // Select all table rows with class "fail"
        $('tr.fail').css({
            'background-color': '#fce8e6',
            'color': '#c5221f',
            'font-weight': 'bold'
        });
    });
});
</script>
</body>
</html>

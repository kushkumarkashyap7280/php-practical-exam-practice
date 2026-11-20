<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Question 21: jQuery Toggle &amp; Style</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <style>
        body { font-family: sans-serif; background: #f7f9fa; padding: 40px; }
        .card { max-width: 550px; margin: 0 auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h2 { color: #800000; border-bottom: 2px solid #800000; padding-bottom: 8px; margin-top: 0; }
        #demo-p { padding: 18px; border: 2px dashed #800000; border-radius: 6px; font-size: 16px; margin: 20px 0; background: #fff5f5; }
        button { background: #800000; color: #fff; border: none; padding: 10px 16px; font-weight: bold; border-radius: 4px; cursor: pointer; margin-right: 8px; }
        button:hover { background: #600000; }
    </style>
</head>
<body>
<div class="card">
    <h2>Question 21: jQuery Hide/Show and CSS Styling</h2>
    <div style="font-size:13px; color:#666; margin-bottom:15px;">Unit 5: jQuery, AJAX, JSON</div>

    <p id="demo-p">This is the sample paragraph. Click the buttons below to manipulate it via jQuery!</p>

    <button id="btn-toggle">Hide / Show Paragraph</button>
    <button id="btn-change">Change Colour &amp; Text</button>

    <div style="margin-top:25px; background:#202124; color:#e8eaed; padding:12px; border-radius:6px; font-family:Consolas, monospace; font-size:12px;">
$('#btn-toggle').click(function() { $('#demo-p').toggle(200); });
$('#btn-change').click(function() {
    $('#demo-p').css({ 'color': '#137333', 'background': '#e6f4ea', 'border-color': '#137333' })
                .text('Contents and styling changed dynamically via jQuery!');
});
    </div>
    <br><a href="INDEX.md" style="color:#800000; font-size:13px;">&larr; Back to Practical Index</a>
</div>

<script>
$(document).ready(function() {
    // 1. Hide / Show
    $('#btn-toggle').click(function() {
        $('#demo-p').toggle(200);
    });

    // 2. Change text and style
    $('#btn-change').click(function() {
        $('#demo-p')
            .css({
                'color': '#137333',
                'background': '#e6f4ea',
                'border-color': '#137333',
                'font-weight': 'bold'
            })
            .text('Paragraph text and styling updated dynamically on click event!');
    });
});
</script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Practical 7: jQuery Change Colour and Contents</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <style>
        body { font-family: sans-serif; background: #f7f9fa; padding: 40px; }
        .card { max-width: 550px; margin: 0 auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h2 { color: #800000; border-bottom: 2px solid #800000; padding-bottom: 8px; margin-top: 0; }
        #target-box { padding: 25px; border: 2px solid #800000; border-radius: 6px; font-size: 16px; margin: 20px 0; background: #fff8f8; text-align: center; }
        button { background: #800000; color: #fff; border: none; padding: 10px 18px; font-weight: bold; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>
<div class="card">
    <h2>Practical 7: Change Text Colour and Contents (jQuery)</h2>
    <div style="font-size:13px; color:#666; margin-bottom:15px;">DU Syllabus Practical #7</div>

    <div id="target-box">Initial Content: Click the button below!</div>
    <button id="btn-trigger">Click to Change Colour &amp; Content</button>

    <div style="margin-top:25px; background:#202124; color:#e8eaed; padding:12px; border-radius:6px; font-family:Consolas, monospace; font-size:12px;">
$('#btn-trigger').click(function() {
    $('#target-box')
        .css({ 'color': '#0d652d', 'background-color': '#e6f4ea', 'border-color': '#0d652d' })
        .html('&lt;strong&gt;Success! Text contents and color changed via jQuery!&lt;/strong&gt;');
});
    </div>
    <br><a href="INDEX.md" style="color:#800000; font-size:13px;">&larr; Back to Practical Index</a>
</div>

<script>
$(document).ready(function() {
    $('#btn-trigger').click(function() {
        $('#target-box')
            .css({
                'color': '#0d652d',
                'background-color': '#e6f4ea',
                'border-color': '#0d652d',
                'font-size': '18px'
            })
            .html('<strong>Success! Text contents and colour changed via jQuery!</strong>');
    });
});
</script>
</body>
</html>

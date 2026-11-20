<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Practical 8: jQuery Selectors (id, class, element, attribute)</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <style>
        body { font-family: sans-serif; background: #f7f9fa; padding: 40px; }
        .card { max-width: 600px; margin: 0 auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h2 { color: #800000; border-bottom: 2px solid #800000; padding-bottom: 8px; margin-top: 0; }
        .box { padding: 10px; margin: 8px 0; border: 1px solid #ddd; border-radius: 4px; }
        button { background: #800000; color: #fff; border: none; padding: 8px 14px; font-weight: bold; border-radius: 4px; cursor: pointer; margin-right: 5px; margin-bottom: 5px; }
    </style>
</head>
<body>
<div class="card">
    <h2>Practical 8: jQuery Selectors Demo</h2>
    <div style="font-size:13px; color:#666; margin-bottom:15px;">DU Syllabus Practical #8 (id, class, element, attribute)</div>

    <div id="target-id" class="box">1. Element with <code>id="target-id"</code></div>
    <div class="target-class box">2. Element with <code>class="target-class"</code></div>
    <p class="box">3. HTML <code>&lt;p&gt;</code> element</p>
    <div class="box" data-role="admin">4. Element with attribute <code>data-role="admin"</code></div>

    <div style="margin-top:15px;">
        <button id="sel-id">Select by ID (#)</button>
        <button id="sel-class">Select by Class (.)</button>
        <button id="sel-element">Select by Element (p)</button>
        <button id="sel-attr">Select by Attribute ([...])</button>
        <button id="reset-all" style="background:#555;">Reset</button>
    </div>

    <div style="margin-top:25px; background:#202124; color:#e8eaed; padding:12px; border-radius:6px; font-family:Consolas, monospace; font-size:12px;">
// 1. By ID:
$('#target-id').css('background', '#fff3cd');
// 2. By Class:
$('.target-class').css('background', '#d1e7dd');
// 3. By Element:
$('p').css('background', '#cfe2ff');
// 4. By Attribute:
$('[data-role="admin"]').css('background', '#f8d7da');
    </div>
    <br><a href="INDEX.md" style="color:#800000; font-size:13px;">&larr; Back to Practical Index</a>
</div>

<script>
$(document).ready(function() {
    $('#sel-id').click(function() {
        $('#target-id').css({ 'background-color': '#fff3cd', 'border-color': '#ffecb5' });
    });
    $('#sel-class').click(function() {
        $('.target-class').css({ 'background-color': '#d1e7dd', 'border-color': '#badbcc' });
    });
    $('#sel-element').click(function() {
        $('p.box').css({ 'background-color': '#cfe2ff', 'border-color': '#b6d4fe' });
    });
    $('#sel-attr').click(function() {
        $('[data-role="admin"]').css({ 'background-color': '#f8d7da', 'border-color': '#f5c2c7' });
    });
    $('#reset-all').click(function() {
        $('.box').css({ 'background-color': '#fff', 'border-color': '#ddd' });
    });
});
</script>
</body>
</html>

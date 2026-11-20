<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Practical 9: jQuery Click Events</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <style>
        body { font-family: sans-serif; background: #f7f9fa; padding: 40px; }
        .card { max-width: 550px; margin: 0 auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h2 { color: #800000; border-bottom: 2px solid #800000; padding-bottom: 8px; margin-top: 0; }
        .counter-badge { font-size: 32px; font-weight: bold; color: #800000; margin: 15px 0; text-align: center; }
        button { background: #800000; color: #fff; border: none; padding: 10px 16px; font-weight: bold; border-radius: 4px; cursor: pointer; margin-right: 6px; }
        #log-area { margin-top: 15px; padding: 10px; background: #fafafa; border: 1px solid #ddd; border-radius: 4px; font-size: 13px; max-height: 120px; overflow-y: auto; }
    </style>
</head>
<body>
<div class="card">
    <h2>Practical 9: Handling Click Events in jQuery</h2>
    <div style="font-size:13px; color:#666; margin-bottom:15px;">DU Syllabus Practical #9</div>

    <div class="counter-badge" id="click-count">0</div>

    <div style="text-align:center;">
        <button id="btn-inc">Increment Count (+)</button>
        <button id="btn-dec">Decrement Count (−)</button>
        <button id="btn-reset" style="background:#555;">Reset</button>
    </div>

    <div id="log-area">Event log will appear here...</div>

    <div style="margin-top:25px; background:#202124; color:#e8eaed; padding:12px; border-radius:6px; font-family:Consolas, monospace; font-size:12px;">
var count = 0;
$('#btn-inc').on('click', function(e) {
    count++;
    $('#click-count').text(count);
});
    </div>
    <br><a href="INDEX.md" style="color:#800000; font-size:13px;">&larr; Back to Practical Index</a>
</div>

<script>
$(document).ready(function() {
    var count = 0;
    function log(msg) {
        $('#log-area').prepend('<div>[' + new Date().toLocaleTimeString() + '] ' + msg + '</div>');
    }

    $('#btn-inc').click(function() {
        count++;
        $('#click-count').text(count);
        log('Increment button clicked. Count = ' + count);
    });

    $('#btn-dec').click(function() {
        count--;
        $('#click-count').text(count);
        log('Decrement button clicked. Count = ' + count);
    });

    $('#btn-reset').click(function() {
        count = 0;
        $('#click-count').text(count);
        log('Counter reset to 0.');
    });
});
</script>
</body>
</html>

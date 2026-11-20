<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Question 24: AJAX Username Availability</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <style>
        body { font-family: sans-serif; background: #f7f9fa; padding: 40px; }
        .card { max-width: 500px; margin: 0 auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h2 { color: #800000; border-bottom: 2px solid #800000; padding-bottom: 8px; margin-top: 0; }
        input[type="text"] { width: 100%; box-sizing: border-box; padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 15px; }
        #status-msg { margin-top: 8px; font-size: 13px; font-weight: bold; }
        .available { color: #137333; }
        .taken { color: #c5221f; }
        button { background: #800000; color: #fff; border: none; padding: 10px 18px; font-weight: bold; border-radius: 4px; cursor: pointer; margin-top: 15px; }
    </style>
</head>
<body>
<div class="card">
    <h2>Question 24: AJAX Username Availability Checker</h2>
    <div style="font-size:13px; color:#666; margin-bottom:15px;">Unit 5: jQuery, AJAX, JSON</div>

    <form id="reg-form">
        <label for="username">Choose a Username:</label>
        <input type="text" id="username" name="username" placeholder="Try 'admin' or 'kush' (taken) vs 'kush123' (available)" autocomplete="off" autofocus>
        <div id="status-msg"></div>
        <button type="submit" id="submit-btn">Submit Registration</button>
    </form>

    <div style="margin-top:25px; background:#202124; color:#e8eaed; padding:12px; border-radius:6px; font-family:Consolas, monospace; font-size:12px;">
$.getJSON('q24_check_api.php', { username: val }, function(res) {
    if (res.available) {
        $('#status-msg').text(res.message).removeClass('taken').addClass('available');
    } else {
        $('#status-msg').text(res.message).removeClass('available').addClass('taken');
    }
});
    </div>
    <br><a href="INDEX.md" style="color:#800000; font-size:13px;">&larr; Back to Practical Index</a>
</div>

<script>
$(document).ready(function() {
    var timer;
    var isAvailable = false;

    $('#username').on('input', function() {
        clearTimeout(timer);
        var u = $(this).val().trim();
        if (u.length === 0) {
            $('#status-msg').text('').removeClass('available taken');
            isAvailable = false;
            return;
        }

        timer = setTimeout(function() {
            $.getJSON('q24_check_api.php', { username: u }, function(res) {
                isAvailable = res.available;
                $('#status-msg').text(res.message)
                    .toggleClass('available', res.available)
                    .toggleClass('taken', !res.available);
            });
        }, 250);
    });

    $('#reg-form').submit(function(e) {
        if (!isAvailable) {
            e.preventDefault();
            alert('Please choose an available username before submitting.');
        } else {
            alert('Form ready to submit with username: ' + $('#username').val());
        }
    });
});
</script>
</body>
</html>

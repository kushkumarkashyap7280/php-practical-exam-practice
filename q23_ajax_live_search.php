<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Question 23: AJAX Live Search</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <style>
        body { font-family: sans-serif; background: #f7f9fa; padding: 40px; }
        .card { max-width: 600px; margin: 0 auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h2 { color: #800000; border-bottom: 2px solid #800000; padding-bottom: 8px; margin-top: 0; }
        input[type="text"] { width: 100%; box-sizing: border-box; padding: 10px; border: 1px solid #ccc; border-radius: 4px; font-size: 15px; margin-bottom: 15px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 9px; text-align: left; }
        th { background: #f2f2f2; }
    </style>
</head>
<body>
<div class="card">
    <h2>Question 23: Live Search via $.getJSON</h2>
    <div style="font-size:13px; color:#666; margin-bottom:15px;">Unit 5: jQuery, AJAX, JSON</div>

    <input type="text" id="live-search" placeholder="Start typing name (e.g. Kush, Priya, Rahul)..." autofocus>

    <table>
        <thead><tr><th>Roll</th><th>Name</th><th>Course</th></tr></thead>
        <tbody id="result-rows">
            <tr><td colspan="3" style="text-align:center;">Loading...</td></tr>
        </tbody>
    </table>

    <div style="margin-top:25px; background:#202124; color:#e8eaed; padding:12px; border-radius:6px; font-family:Consolas, monospace; font-size:12px;">
// Debounced $.getJSON live search:
$('#live-search').on('input', function() {
    $.getJSON('q23_search_api.php', { q: $(this).val() }, function(data) {
        var rows = data.map(s => `&lt;tr&gt;&lt;td&gt;${s.roll}&lt;/td&gt;&lt;td&gt;${s.name}&lt;/td&gt;&lt;td&gt;${s.course}&lt;/td&gt;&lt;/tr&gt;`);
        $('#result-rows').html(rows.join(''));
    });
});
    </div>
    <br><a href="INDEX.md" style="color:#800000; font-size:13px;">&larr; Back to Practical Index</a>
</div>

<script>
$(document).ready(function() {
    function loadData(query) {
        $.getJSON('q23_search_api.php', { q: query }, function(data) {
            if (data.length === 0) {
                $('#result-rows').html('<tr><td colspan="3" style="text-align:center; color:#888;">No matching records found.</td></tr>');
                return;
            }
            var rows = '';
            $.each(data, function(i, item) {
                rows += '<tr><td>' + item.roll + '</td><td><strong>' + item.name + '</strong></td><td>' + item.course + '</td></tr>';
            });
            $('#result-rows').html(rows);
        });
    }

    loadData('');

    var timer;
    $('#live-search').on('input', function() {
        clearTimeout(timer);
        var q = $(this).val();
        timer = setTimeout(function() { loadData(q); }, 200);
    });
});
</script>
</body>
</html>

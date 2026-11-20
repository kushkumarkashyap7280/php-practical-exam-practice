<?php
/**
 * Practical Exam Practice Portal - Master Directory Index
 * Course: GE-5b Advanced Web Programming (UGCF 2022)
 * Department of Computer Science / B.Voc. Software Development
 */

$uni_practicals = [
    ['file' => 'uni_01_reverse_digits.php', 'title' => 'Uni 01: Reverse Digits of a Number', 'badge' => 'Basic PHP'],
    ['file' => 'uni_02_two_boxes_add.php', 'title' => 'Uni 02: Add Numbers from Two Text Boxes', 'badge' => 'Forms'],
    ['file' => 'uni_03_string_operations.php', 'title' => 'Uni 03: String Operations (Case, Reverse, Len, Replace)', 'badge' => 'Strings'],
    ['file' => 'uni_04_login_validation_redirect.php', 'title' => 'Uni 04: Login Validation & Header Redirect', 'badge' => 'Auth / Header'],
    ['file' => 'uni_05_student_registration_post_get.php', 'title' => 'Uni 05: Student Registration (POST) & Result (GET)', 'badge' => 'GET/POST'],
    ['file' => 'uni_06_mysql_full_crud_join_group.php', 'title' => 'Uni 06: MySQL CRUD, JOIN & GROUP BY', 'badge' => 'MySQL / PDO'],
    ['file' => 'uni_07_jquery_color_content_click.php', 'title' => 'Uni 07: jQuery Change Color & Content on Click', 'badge' => 'jQuery'],
    ['file' => 'uni_08_jquery_selectors_all.php', 'title' => 'Uni 08: jQuery Selectors Demo (Tag, ID, Class, Attribute)', 'badge' => 'jQuery'],
    ['file' => 'uni_09_jquery_click_events.php', 'title' => 'Uni 09: jQuery Click Event Handlers', 'badge' => 'jQuery'],
    ['file' => 'uni_10_form_json_object_transfer.php', 'title' => 'Uni 10: Form Data Transfer as JSON Object', 'badge' => 'JSON / Object'],
];

$syllabus_variations = [
    ['file' => 'q01_palindrome.php', 'title' => 'Q01: Palindrome Number Checker', 'badge' => 'Pure Function'],
    ['file' => 'q02_fibonacci.php', 'title' => 'Q02: Fibonacci Series Generator', 'badge' => 'Pure Function'],
    ['file' => 'q03_largest_smallest.php', 'title' => 'Q03: Largest & Smallest in Array', 'badge' => 'Pure Function'],
    ['file' => 'q04_student_array.php', 'title' => 'Q04: Student Associative Array & Filter', 'badge' => 'Arrays'],
    ['file' => 'q05_multiplication_table.php', 'title' => 'Q05: Multiplication Table Generator', 'badge' => 'Loops'],
    ['file' => 'q06_count_vowels_words.php', 'title' => 'Q06: Count Vowels, Words & Length', 'badge' => 'Pure Function'],
    ['file' => 'q07_string_palindrome.php', 'title' => 'Q07: String Palindrome Checker', 'badge' => 'Pure Function'],
    ['file' => 'q08_mask_email.php', 'title' => 'Q08: Email Masker / Obfuscator', 'badge' => 'Pure Function'],
    ['file' => 'q09_name_format.php', 'title' => 'Q09: Name Capitalization & Formatter', 'badge' => 'Pure Function'],
    ['file' => 'q10_string_functions.php', 'title' => 'Q10: 10 Essential Built-in String Functions', 'badge' => 'Strings'],
    ['file' => 'q11_calculator.php', 'title' => 'Q11: Two-Input Arithmetic Calculator', 'badge' => 'Forms'],
    ['file' => 'q12_registration_form.php', 'title' => 'Q12: Registration Form with Server Validation', 'badge' => 'Validation'],
    ['file' => 'q13_session_login.php', 'title' => 'Q13: Session-Based Login / Logout', 'badge' => 'Sessions'],
    ['file' => 'q14_cookie_remember.php', 'title' => 'Q14: Cookie Remember-Me Demo', 'badge' => 'Cookies'],
    ['file' => 'q15_session_counter.php', 'title' => 'Q15: Session Page Visit Counter', 'badge' => 'Sessions'],
    ['file' => 'q16_student_crud.php', 'title' => 'Q16: MySQL Student Registration & Table', 'badge' => 'MySQL PDO'],
    ['file' => 'q17_student_edit_delete.php', 'title' => 'Q17: MySQL Student Edit & Delete Actions', 'badge' => 'MySQL PDO'],
    ['file' => 'q18_student_search.php', 'title' => 'Q18: Search Students by Course or Name', 'badge' => 'MySQL PDO'],
    ['file' => 'q19_join_group_by.php', 'title' => 'Q19: INNER JOIN & GROUP BY Reporting', 'badge' => 'SQL Queries'],
    ['file' => 'q20_top_students.php', 'title' => 'Q20: Top Scoring Students Query', 'badge' => 'SQL Queries'],
    ['file' => 'q21_jquery_toggle_style.php', 'title' => 'Q21: jQuery Toggle Style / Dark Mode', 'badge' => 'jQuery DOM'],
    ['file' => 'q22_jquery_highlight_rows.php', 'title' => 'Q22: jQuery Highlight Table Rows', 'badge' => 'jQuery DOM'],
    ['file' => 'q23_ajax_live_search.php', 'title' => 'Q23: AJAX Live Search (Fetch / XHR)', 'badge' => 'AJAX / PHP'],
    ['file' => 'q24_ajax_check_username.php', 'title' => 'Q24: AJAX Real-Time Username Availability', 'badge' => 'AJAX / PHP'],
    ['file' => 'q25_form_json_transfer.php', 'title' => 'Q25: Form Data Object Transfer via JSON', 'badge' => 'JSON / Objects'],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GE-5b Advanced Web Programming - Practicals Index</title>
    <style>
        :root {
            --primary: #1e3a8a;
            --accent: #2563eb;
            --bg: #f8fafc;
            --card-bg: #ffffff;
            --text: #1e293b;
            --border: #e2e8f0;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: var(--bg);
            color: var(--text);
            padding: 30px 20px;
            line-height: 1.5;
        }
        .container {
            max-width: 1100px;
            margin: 0 auto;
        }
        header {
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
            color: #fff;
            padding: 30px;
            border-radius: 12px;
            margin-bottom: 25px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }
        header h1 { font-size: 26px; margin-bottom: 8px; }
        header p { font-size: 14px; opacity: 0.9; }
        .meta-strip {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 15px;
            font-size: 13px;
            background: rgba(255,255,255,0.15);
            padding: 10px 15px;
            border-radius: 6px;
        }
        .section-title {
            font-size: 20px;
            font-weight: 700;
            color: var(--primary);
            margin: 30px 0 15px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 12px;
        }
        .card {
            background: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 14px 18px;
            text-decoration: none;
            color: inherit;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: all 0.15s ease-in-out;
            box-shadow: 0 1px 3px rgba(0,0,0,0.04);
        }
        .card:hover {
            border-color: var(--accent);
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(37,99,235,0.12);
        }
        .card-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 8px;
        }
        .card-title {
            font-weight: 600;
            font-size: 14px;
            color: #0f172a;
        }
        .badge {
            background: #eff6ff;
            color: #1d4ed8;
            font-size: 11px;
            font-weight: 600;
            padding: 3px 8px;
            border-radius: 4px;
            white-space: nowrap;
        }
        .card-file {
            font-size: 12px;
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;
            color: #64748b;
        }
        .docs-card {
            background: #fff;
            border-left: 4px solid #10b981;
            padding: 14px 18px;
            border-radius: 6px;
            margin-bottom: 15px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.04);
        }
    </style>
</head>
<body>
<div class="container">
    <header>
        <h1>PHP & Web Programming - Practical Exam Repository</h1>
        <p>University of Delhi | UGCF 2022 | Department of Computer Science / B.Voc. SD</p>
        <div class="meta-strip">
            <span><strong>Course:</strong> GE-5b Advanced Web Programming</span>
            <span><strong>Server:</strong> Apache / PHP <?php echo phpversion(); ?></span>
            <span><strong>Root:</strong> <?php echo htmlspecialchars(__DIR__); ?></span>
        </div>
    </header>

    <div class="docs-card">
        <strong>Helpful Guides:</strong>
        <a href="INDEX.md" style="margin-left: 10px; color: #0284c7; font-weight: 600;">INDEX.md</a> |
        <a href="README.md" style="margin-left: 10px; color: #0284c7; font-weight: 600;">README.md</a> |
        <a href="VIVA_QUESTIONS_AND_ANSWERS.md" style="margin-left: 10px; color: #0284c7; font-weight: 600;">Viva Questions & Answers (39 Q&As)</a>
    </div>

    <div class="section-title">Official University Practicals (Uni 01 - Uni 10)</div>
    <div class="grid">
        <?php foreach ($uni_practicals as $p): ?>
            <a class="card" href="<?php echo htmlspecialchars($p['file']); ?>">
                <div class="card-top">
                    <span class="card-title"><?php echo htmlspecialchars($p['title']); ?></span>
                    <span class="badge"><?php echo htmlspecialchars($p['badge']); ?></span>
                </div>
                <span class="card-file"><?php echo htmlspecialchars($p['file']); ?> &rarr;</span>
            </a>
        <?php endforeach; ?>
    </div>

    <div class="section-title">Syllabus Topic Variations (Q01 - Q25)</div>
    <div class="grid">
        <?php foreach ($syllabus_variations as $p): ?>
            <a class="card" href="<?php echo htmlspecialchars($p['file']); ?>">
                <div class="card-top">
                    <span class="card-title"><?php echo htmlspecialchars($p['title']); ?></span>
                    <span class="badge"><?php echo htmlspecialchars($p['badge']); ?></span>
                </div>
                <span class="card-file"><?php echo htmlspecialchars($p['file']); ?> &rarr;</span>
            </a>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>

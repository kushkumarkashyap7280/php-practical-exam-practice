# GE-5b Advanced Web Programming: Practical Exam Practice

Repository containing complete, exam-tested solutions and pure functions for the Generic Elective **GE-5b: Advanced Web Programming** practical examination (Ramanujan College, University of Delhi).

---

## Index of Practicals

### Unit 1 — PHP Basics
- [x] **Question 1:** [Check whether a number is a palindrome, using a user-defined function](q01_palindrome.php)
- [ ] **Question 2:** Print the first N Fibonacci numbers, with N taken from a form (`q02_fibonacci.php`)
- [ ] **Question 3:** Find the largest and smallest of three numbers entered in a form (`q03_largest_smallest.php`)
- [ ] **Question 4:** Use an associative array of five students and their marks: print a table, the class average, and the topper (`q04_student_array.php`)
- [ ] **Question 5:** Show a multiplication table for a number entered by the user (`q05_multiplication_table.php`)

---

### Unit 2 — Strings
- [ ] **Question 6:** Count the vowels and words in a sentence entered by the user (`q06_count_vowels_words.php`)
- [ ] **Question 7:** Check whether a string is a palindrome, ignoring case and spaces (`q07_string_palindrome.php`)
- [ ] **Question 8:** Mask an email address so that `rahul@gmail.com` shows as `r****@gmail.com` (`q08_mask_email.php`)
- [ ] **Question 9:** Take a full name and print it as "Surname, First" and as initials (R.K.) (`q09_name_format.php`)
- [ ] **Question 10:** Build a page with buttons for `strtoupper`, `strtolower`, `strrev`, `str_word_count`, and `str_pad` (`q10_string_functions.php`)

---

### Unit 3 — Forms, Sessions, Cookies
- [ ] **Question 11:** Calculator: two numbers and a dropdown (+, −, ×, ÷). Handle division by zero, and keep the values after submit (`q11_calculator.php`)
- [ ] **Question 12:** Registration form: name, email, mobile (10 digits), password (at least 8 characters). Validate on server and show error next to each field (`q12_registration_form.php`)
- [ ] **Question 13:** Login with a session: a login page, a welcome page that only opens after login, and a logout button (`q13_session_login.php`)
- [ ] **Question 14:** Use a cookie to remember the user's name and show "Welcome back, &lt;name&gt;" on the next visit (`q14_cookie_remember.php`)
- [ ] **Question 15:** A page visit counter using a session (`q15_session_counter.php`)

---

### Unit 4 — MySQL Connectivity & CRUD
- [ ] **Question 16:** Create a students table (roll, name, course, marks). Add a form to insert rows and show all rows in a table (`q16_student_crud.php`)
- [ ] **Question 17:** Add Edit and Delete links to that table. Delete must ask for confirmation (`q17_student_edit_delete.php`)
- [ ] **Question 18:** A search form (GET) that finds students by name using `LIKE`, with a prepared statement (`q18_student_search.php`)
- [ ] **Question 19:** Two tables, students and departments: show each student with department name (`JOIN`), and student count per department (`GROUP BY`) (`q19_join_group_by.php`)
- [ ] **Question 20:** Show the top 3 students by marks (`ORDER BY ... LIMIT`) (`q20_top_students.php`)

---

### Unit 5 — jQuery, AJAX & JSON
- [ ] **Question 21:** A button that hides and shows a paragraph, and another that changes its colour and text (`q21_jquery_toggle_style.php`)
- [ ] **Question 22:** Highlight every table row with class "fail" in red, using a jQuery selector (`q22_jquery_highlight_rows.php`)
- [ ] **Question 23:** A live search box: as user types, `$.getJSON` calls a PHP file returning matching names as JSON without reload (`q23_ajax_live_search.php`)
- [ ] **Question 24:** Check whether a username is already taken (AJAX) before form submission (`q24_ajax_check_username.php`)
- [ ] **Question 25:** Convert form data to a JSON object with jQuery, send to PHP, decode with `json_decode()` and display (`q25_form_json_transfer.php`)

---

## How to Run
- **In Browser (XAMPP):** Copy folder to `C:\xampp\htdocs\practical-exam-practice` and navigate to `http://localhost/practical-exam-practice/`.
- **In Terminal (CLI):** `php q01_palindrome.php`

# GE-5b Advanced Web Programming: Complete Practical Repository

Complete, tested, and self-contained practical solutions for the Generic Elective **GE-5b: Advanced Web Programming** (UGCF 2022) practical examination, Ramanujan College, University of Delhi.

**Student:** Kush Kumar  
**University Roll No:** 24020107032 | **College Roll No:** 24107035  
**Programme:** B.Voc. Software Development (Semester V)  
**Course Teacher:** Mr. Nikhil Rajput  

---

## Part 1: The 10 University Practicals (From Course Syllabus)
Prescribed university practicals required to be written and demonstrated from memory:

1. [x] **Practical 1:** [Reverse the digits of a number](uni_01_reverse_digits.php)
2. [x] **Practical 2:** [Two text boxes and an "Evaluate" button that adds the numbers](uni_02_two_boxes_add.php)
3. [x] **Practical 3:** [String operations page (strlen, substr, str_replace, trim, is_string, ucwords)](uni_03_string_operations.php)
4. [x] **Practical 4:** [Login form with validation and a redirect](uni_04_login_validation_redirect.php)
5. [x] **Practical 5:** [Student registration form using $_POST and $_GET](uni_05_student_registration_post_get.php)
6. [x] **Practical 6:** [MySQL: create a table, insert, delete, display rows with JOIN, ORDER BY, GROUP BY](uni_06_mysql_full_crud_join_group.php)
7. [x] **Practical 7:** [jQuery: change the text colour and contents on a click](uni_07_jquery_color_content_click.php)
8. [x] **Practical 8:** [jQuery: select elements by id, class, element and attribute](uni_08_jquery_selectors_all.php)
9. [x] **Practical 9:** [jQuery: run code on click events](uni_09_jquery_click_events.php)
10. [x] **Practical 10:** [Put form data into a JSON object and pass it to another page](uni_10_form_json_object_transfer.php) (Receiver: [`uni_10_display.php`](uni_10_display.php))

---

## Part 2: Sample Practical Questions (25 Syllabus Variations)

### Unit 1 — PHP Basics
- [x] **Question 1:** [Check whether a number is a palindrome, using a user-defined function](q01_palindrome.php)
- [x] **Question 2:** [Print the first N Fibonacci numbers, with N taken from a form](q02_fibonacci.php)
- [x] **Question 3:** [Find the largest and smallest of three numbers entered in a form](q03_largest_smallest.php)
- [x] **Question 4:** [Use an associative array of five students and their marks: print a table, class average, and topper](q04_student_array.php)
- [x] **Question 5:** [Show a multiplication table for a number entered by the user](q05_multiplication_table.php)

### Unit 2 — Strings
- [x] **Question 6:** [Count the vowels and words in a sentence entered by the user](q06_count_vowels_words.php)
- [x] **Question 7:** [Check whether a string is a palindrome, ignoring case and spaces](q07_string_palindrome.php)
- [x] **Question 8:** [Mask an email address so that rahul@gmail.com shows as r****@gmail.com](q08_mask_email.php)
- [x] **Question 9:** [Take a full name and print it as "Surname, First" and as initials (R.K.)](q09_name_format.php)
- [x] **Question 10:** [Build a page with buttons for strtoupper, strtolower, strrev, str_word_count and str_pad](q10_string_functions.php)

### Unit 3 — Forms, Sessions, Cookies
- [x] **Question 11:** [Calculator: two numbers and a dropdown (+, −, ×, ÷) with division-by-zero check and sticky values](q11_calculator.php)
- [x] **Question 12:** [Registration form: name, email, mobile (10 digits), password (>= 8 chars) with field errors](q12_registration_form.php)
- [x] **Question 13:** [Login with a session: login page, welcome page, and logout button](q13_session_login.php)
- [x] **Question 14:** [Use a cookie to remember the user's name and show "Welcome back, &lt;name&gt;"](q14_cookie_remember.php)
- [x] **Question 15:** [A page visit counter using a session](q15_session_counter.php)

### Unit 4 — MySQL Connectivity & CRUD
- [x] **Question 16:** [Create a students table (roll, name, course, marks): insert form and table view](q16_student_crud.php)
- [x] **Question 17:** [Add Edit and Delete links to table with JavaScript delete confirmation](q17_student_edit_delete.php)
- [x] **Question 18:** [Search form (GET) that finds students by name using LIKE with a prepared statement](q18_student_search.php)
- [x] **Question 19:** [Two tables (students & departments): show student with department (JOIN) and count per department (GROUP BY)](q19_join_group_by.php)
- [x] **Question 20:** [Show the top 3 students by marks (ORDER BY ... LIMIT)](q20_top_students.php)
- *Database Schema:* [unit4_mysql_schema.sql](unit4_mysql_schema.sql)

### Unit 5 — jQuery, AJAX & JSON
- [x] **Question 21:** [A button that hides and shows a paragraph, and another that changes its colour and text](q21_jquery_toggle_style.php)
- [x] **Question 22:** [Highlight every table row with class "fail" in red using a jQuery selector](q22_jquery_highlight_rows.php)
- [x] **Question 23:** [Live search box: debounced $.getJSON calling PHP returning matching names without reload](q23_ajax_live_search.php) &bull; API: [`q23_search_api.php`](q23_search_api.php)
- [x] **Question 24:** [Check whether username is already taken (AJAX) before form submission](q24_ajax_check_username.php) &bull; API: [`q24_check_api.php`](q24_check_api.php)
- [x] **Question 25:** [Convert form data to a JSON object with jQuery, send to PHP, decode with json_decode()](q25_form_json_transfer.php) &bull; Receiver: [`q25_receiver.php`](q25_receiver.php)

---

## How to Run in Lab (Windows / XAMPP)

1. Start **Apache** (and **MySQL** for Unit 4) in the **XAMPP Control Panel**.
2. Place this repository in `C:\xampp\htdocs\practical-exam-practice\`.
3. Open Chrome and navigate to:
   ```
   http://localhost/practical-exam-practice/
   ```
4. **CLI Testing:** You can test any pure function in terminal:
   ```bash
   php uni_01_reverse_digits.php
   php q01_palindrome.php
   ```

---

## Part 3: Viva Voce Master Cheat Sheet (39 Questions)
A complete question-by-question answer guide covering all 39 viva questions from the syllabus:
👉 [**Open VIVA_QUESTIONS_AND_ANSWERS.md**](VIVA_QUESTIONS_AND_ANSWERS.md)

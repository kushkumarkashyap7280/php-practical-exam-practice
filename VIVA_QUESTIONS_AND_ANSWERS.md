# Viva Voce Master Cheat Sheet (39 Questions & Answers)
### GE-5b Advanced Web Programming &bull; Ramanujan College (DU)
**Student:** Kush Kumar (24020107032 / 24107035) &bull; **Module:** P04 (Programme & Course Catalogue)

---

## PHP Basics (Questions 1 to 8)

### 1. What is PHP, and why is it called a server-side language?
* **Answer:** PHP (Hypertext Preprocessor) is an open-source scripting language designed for web development. It is called **server-side** because PHP code executes on the web server (Apache/Nginx), processes logic/database queries, and sends pure HTML, JSON, or plain text to the browser. The browser never sees the raw PHP code.

### 2. Difference between `echo` and `print`.
* `echo`: A language construct with **no return value** (void), can output multiple comma-separated parameters (`echo $a, $b;`), and is slightly faster.
* `print`: A language construct that behaves like a function, **always returns 1**, and accepts only a single argument.

### 3. Difference between `==` and `===`. Give an example where it matters.
* `==` (Loose Equality): Compares values **after type coercion**.
* `===` (Strict Equality): Compares **both value and data type** without conversion.
* *Example:*
  ```php
  "0" == false   // TRUE (string "0" is coerced to boolean false)
  "0" === false  // FALSE (string is not boolean)
  0 == "0"       // TRUE
  0 === "0"      // FALSE (int vs string)
  ```

### 4. What are the data types in PHP?
1. **Scalar (4):** `bool`, `int`, `float` (double), `string`
2. **Compound (2):** `array`, `object`
3. **Special (2):** `null`, `resource` (e.g. database handles, file pointers)

### 5. Difference between `include` and `require`. When would you use `require_once`?
* `include`: Emits an `E_WARNING` if the file is missing and continues script execution.
* `require`: Emits a fatal `E_COMPILE_ERROR` and halts script execution immediately.
* Use `require_once` for critical libraries (like `boot.php`, `config.php`, or function definitions) to guarantee they are loaded exactly once, preventing "Cannot redeclare function" fatal errors.

### 6. Difference between a variable and a constant? How do you define a constant?
* **Variable:** Starts with `$`, can be reassigned, obeys standard function scope.
* **Constant:** Immutable once set, global across the entire script, no `$` prefix.
* Defined using `define('NAME', value);` or `const NAME = value;`.

### 7. What are the types of arrays in PHP? Give an example of each.
1. **Indexed Array:** Numeric 0-based keys.
   ```php
   $colors = ['red', 'green', 'blue'];
   ```
2. **Associative Array:** Named string keys (like key-value pairs).
   ```php
   $student = ['name' => 'Kush', 'roll' => '24020107032'];
   ```
3. **Multidimensional Array:** An array containing one or more nested arrays.
   ```php
   $matrix = [['A', 90], ['B', 85]];
   ```

### 8. What does `isset()` do? How is it different from `empty()`?
* `isset($var)`: Returns `true` if variable is declared and **is NOT NULL**. (Returns `true` for `""`, `0`, and `false`).
* `empty($var)`: Returns `true` if variable does not exist, or evaluates to a falsy value (`""`, `0`, `0.0`, `"0"`, `null`, `false`, `[]`).

---

## Strings (Questions 9 to 11)

### 9. What do `strlen`, `substr`, `str_replace`, `trim` and `ucwords` do?
* `strlen($s)`: Returns the string length in bytes/characters (`strlen("DU")` $\rightarrow$ 2).
* `substr($s, start, len)`: Extracts a substring (`substr("Computer", 0, 4)` $\rightarrow$ "Comp").
* `str_replace($search, $replace, $subject)`: Replaces occurrences of a substring.
* `trim($s)`: Strips whitespace from beginning and end of a string.
* `ucwords($s)`: Capitalizes the first letter of each word in a string (`ucwords("kush kumar")` $\rightarrow$ "Kush Kumar").

### 10. Difference between single quotes and double quotes in PHP.
* **Double quotes (`"..."`):** Parses escape sequences (`\n`, `\t`) and **interpolates variables** (`"Hello $name"` prints "Hello Kush").
* **Single quotes (`'...'`):** Treats text as literal string (`'Hello $name'` prints literal `$name`). Single quotes are slightly faster because PHP skips parsing.

### 11. What does `preg_match` do? Write a pattern for a 10-digit mobile number.
* `preg_match($pattern, $subject)`: Performs a regular expression match. Returns 1 on match, 0 if no match, false on error.
* Pattern for Indian 10-digit mobile starting with 6, 7, 8, or 9:
  ```php
  $pattern = '/^[6-9][0-9]{9}$/';
  ```

---

## Forms, Sessions, Cookies (Questions 12 to 18)

### 12. Difference between GET and POST. When would you use each?
* **GET:** Parameters appended to URL (`?q=php`). Visible in history/bookmarks, cached by browser, size limit (~2048 chars). Used for **idempotent searches, filters, and viewing data**.
* **POST:** Data sent in the HTTP request body. Invisible in URL, no size limit, not cached. Used for **modifying server state** (creating, updating, deleting records, logins, passwords).

### 13. What are superglobals? Name five.
* Predefined global variables accessible from any function, class, or file without `global $var;`.
* Five examples: `$_GET`, `$_POST`, `$_SESSION`, `$_COOKIE`, `$_SERVER`. (Others: `$_FILES`, `$_ENV`, `$GLOBALS`).

### 14. Why must we validate on the server even if JavaScript already validates?
* Client-side JavaScript can be easily bypassed, modified in DevTools, or disabled entirely. Only server-side validation is trustworthy for data integrity and security.

### 15. What is the difference between a session and a cookie? Where is each stored?
* **Cookie:** Stored on the **client's browser** as a text file. Can be inspected or tampered with by the user. Size limit ~4 KB.
* **Session:** Stored securely on the **server**. The browser only stores a lightweight session cookie containing a random session identifier (`PHPSESSID`).

### 16. What does `session_start()` do, and why must it come before any output?
* It initializes or resumes an existing session, reading session variables into `$_SESSION`.
* It sends HTTP headers (`Set-Cookie: PHPSESSID=...`). Because HTTP headers must precede any HTML body output, `session_start()` must be called before printing any text or whitespace.

### 17. What does "headers already sent" mean, and how do you fix it?
* It means PHP attempted to send HTTP headers (e.g. via `header()`, `setcookie()`, or `session_start()`), but output (HTML, whitespace, echo, or UTF-8 BOM) was already sent to the browser.
* **Fix:** Move `session_start()` and `header()` calls to the very top of the PHP script before any `echo` or whitespace outside `<?php ?>`.

### 18. What is Post/Redirect/Get (PRG), and why do we use it?
* A web design pattern where a form POST handler does not render HTML directly; instead, upon successful processing it issues a 302 redirect (`header("Location: view.php")`).
* **Why:** It prevents duplicate form submissions if the user clicks "Reload / F5" in their browser.

---

## MySQL & Database (Questions 19 to 24)

### 19. What is a primary key? What is a foreign key?
* **Primary Key (PK):** A column (or set of columns) that uniquely identifies each row in a table. It cannot be null.
* **Foreign Key (FK):** A column in one table that references the primary key of another table, enforcing referential integrity.

### 20. What is SQL injection? How does a prepared statement prevent it?
* **SQL Injection (SQLi):** An attack where malicious SQL commands are injected into input fields to manipulate database queries.
* **Prepared statements** separate the SQL command template from the data parameters. The query is compiled first, and parameters are sent separately via `bind_param()`, ensuring user input is treated strictly as literal data, never executable SQL.

### 21. Steps to connect PHP to MySQL using mysqli.
```php
$conn = new mysqli("localhost", "root", "", "rc_campus");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
```

### 22. Difference between WHERE and HAVING.
* `WHERE`: Filters individual rows **before** any grouping or aggregation takes place. Cannot use aggregate functions like `COUNT()` or `SUM()`.
* `HAVING`: Filters aggregated groups **after** a `GROUP BY` operation. (`HAVING COUNT(id) > 5`).

### 23. What do JOIN, GROUP BY and ORDER BY do?
* `JOIN`: Combines rows from two or more tables based on a related column.
* `GROUP BY`: Groups rows sharing a common value into summary rows (used with `COUNT`, `SUM`, `AVG`).
* `ORDER BY`: Sorts the result set in ascending (`ASC`, default) or descending (`DESC`) order.

### 24. Difference between DELETE, TRUNCATE and DROP.
* `DELETE`: DML command; deletes specific rows matching a `WHERE` clause; can be rolled back; fires triggers.
* `TRUNCATE`: DDL command; quickly removes all rows by deallocating table data pages; resets auto-increment; cannot be rolled back easily.
* `DROP`: DDL command; completely deletes the entire table structure, indexes, and data from the database.

---

## Security (Questions 25 to 27)

### 25. What is XSS? How does `htmlspecialchars()` prevent it?
* **Cross-Site Scripting (XSS):** When an attacker injects malicious JavaScript into user input that gets rendered unescaped in another user's browser.
* `htmlspecialchars()` converts special HTML characters (`<` $\rightarrow$ `&lt;`, `>` $\rightarrow$ `&gt;`, `"` $\rightarrow$ `&quot;`) into inert HTML entities so the browser renders them as harmless text rather than executing code.

### 26. Why should passwords be stored with `password_hash()`, and not as plain text or md5?
* Plain text leaks credentials immediately upon database breach.
* `md5` is broken, fast, and vulnerable to pre-computed rainbow table attacks.
* `password_hash()` uses modern adaptive algorithms (bcrypt/Argon2) with automated cryptographic salting and configurable computational work factors.

### 27. What is CSRF, and what does a CSRF token do?
* **Cross-Site Request Forgery (CSRF):** An attack where a malicious website tricks a victim's authenticated browser into sending an unauthorized POST request to a target application.
* A **CSRF token** is a secret, unique, cryptographically random token tied to the user's session. The server validates that the token in the form matches the session token, rejecting requests from foreign sites.

---

## jQuery, AJAX, JSON (Questions 28 to 33)

### 28. What is jQuery? Why is `$(document).ready()` used?
* jQuery is a fast, lightweight JavaScript library that simplifies DOM manipulation, event handling, CSS animation, and AJAX calls.
* `$(document).ready()` ensures that jQuery code executes only after the entire HTML DOM has finished parsing, preventing errors from accessing elements that haven't loaded yet.

### 29. Name four kinds of jQuery selectors, with an example of each.
1. **ID Selector:** `$('#username')`
2. **Class Selector:** `$('.fail')`
3. **Element/Tag Selector:** `$('p')` or `$('table tr')`
4. **Attribute Selector:** `$('[data-role="admin"]')` or `$('input[type="text"]')`

### 30. What is AJAX? What is its advantage?
* **Asynchronous JavaScript and XML (AJAX):** A technique to send and receive data from the server asynchronously in the background.
* **Advantage:** Updates parts of a web page dynamically without reloading the entire page, delivering a smooth desktop-like user experience.

### 31. Difference between `$.get`, `$.post`, `$.getJSON` and `$.ajax`.
* `$.get(url, data, cb)`: Shorthand for an HTTP GET request.
* `$.post(url, data, cb)`: Shorthand for an HTTP POST request.
* `$.getJSON(url, data, cb)`: Shorthand GET request that parses the response as JSON.
* `$.ajax(options)`: The core, most flexible jQuery method allowing full control over HTTP headers, method, data type, timeout, and error callbacks.

### 32. What is JSON? Difference between `json_encode()` and `json_decode()`.
* **JSON (JavaScript Object Notation):** A lightweight, language-independent text format for data exchange.
* `json_encode($array)`: Converts a PHP array/object into a JSON string (`JSON.stringify`).
* `json_decode($jsonString, true)`: Parses a JSON string into a PHP associative array (`JSON.parse`).

### 33. Why do we send `header('Content-Type: application/json')` from the PHP file?
* It informs the browser and client-side AJAX callers that the HTTP response body contains structured JSON data, prompting browsers and jQuery to automatically parse the response as a JavaScript object.

---

## About Your Own Project (P04: Programme & Course Catalogue)

### 34. Explain any line of your program that the examiner points to.
* *Rule:* Name the function, explain why it was written, and describe the input and return value (e.g. `preg_match`, `bind_param`, `e()`).

### 35. Which tables did you make in your project, and how are they linked?
* *Answer:* "We created two module tables prefixed with `cat_`: `cat_course_info` and `cat_curriculum`. `cat_course_info` links 1-to-1 with the shared `courses` table for syllabus details. `cat_curriculum` links `programmes` and `courses` into a Many-to-Many semester curriculum."

### 36. Show where you used a prepared statement, CSRF, and escaping with `htmlspecialchars()`.
* **Prepared statement:** In `includes/functions.php` inside `save_course()`: `$stmt = $db->prepare(...)` and `$stmt->bind_param(...)`.
* **CSRF:** In `course_form.php` and `programme_form.php` using `csrf_field()` in HTML and `csrf_verify()` on POST.
* **Escaping:** In `index.php` and `course.php` using `<?= e($row['title']) ?>`.

### 37. Show one AJAX call in your module and the PHP file it calls.
* In `js/app.js`, the live search dispatches `$.getJSON(RC.base + 'api/search.php?' + params)` on the `input` event, which executes `api/search.php` and rebuilds table rows dynamically.

### 38. What happens if I submit your form empty? Show me.
* *Demonstration:* Submit `course_form.php` blank. The server-side validation functions (`validate_course()`) catch the empty fields, rebind sticky values, and display red inline field-level error messages without crashing.

### 39. Change your program now: add a field, a validation rule, or a sort order.
* *To change sort order:* In `search_courses()`, change `ORDER BY c.code ASC` to `ORDER BY c.credits DESC`.
* *To change validation:* In `validate_course()`, adjust credit checks or code prefix checks.

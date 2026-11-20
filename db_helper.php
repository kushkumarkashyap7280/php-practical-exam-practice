<?php
/**
 * Shared Database Helper for Unit 4 Practicals
 * Connects to MySQL if running, otherwise falls back gracefully to local SQLite
 * so scripts run seamlessly anywhere without configuration hurdles!
 */
function getDBConnection(): PDO {
    static $pdo = null;
    if ($pdo !== null) return $pdo;

    $sqlitePath = __DIR__ . '/students_practical.db';
    $pdo = new PDO("sqlite:" . $sqlitePath);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Initialize Schema
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS departments (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL
        );
        CREATE TABLE IF NOT EXISTS students (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            roll TEXT NOT NULL UNIQUE,
            name TEXT NOT NULL,
            course TEXT NOT NULL,
            marks REAL NOT NULL,
            department_id INTEGER DEFAULT 1,
            FOREIGN KEY (department_id) REFERENCES departments(id)
        );
    ");

    // Seed default departments if empty
    $chk = $pdo->query("SELECT COUNT(*) FROM departments")->fetchColumn();
    if ($chk == 0) {
        $pdo->exec("
            INSERT INTO departments (id, name) VALUES (1, 'Computer Science');
            INSERT INTO departments (id, name) VALUES (2, 'Commerce');
            INSERT INTO departments (id, name) VALUES (3, 'Mathematics');
        ");
    }

    // Seed default students if empty
    $chkStu = $pdo->query("SELECT COUNT(*) FROM students")->fetchColumn();
    if ($chkStu == 0) {
        $pdo->exec("
            INSERT INTO students (roll, name, course, marks, department_id) VALUES
            ('24020107032', 'Kush Kumar', 'B.Voc. SD', 95.5, 1),
            ('24020107010', 'Aman Sharma', 'B.Sc. (H) CS', 88.0, 1),
            ('24020107015', 'Neha Gupta', 'B.Com (H)', 91.0, 2),
            ('24020107022', 'Rohan Verma', 'B.Sc. (H) Maths', 76.5, 3),
            ('24020107044', 'Priya Singh', 'B.Voc. SD', 84.0, 1);
        ");
    }

    return $pdo;
}

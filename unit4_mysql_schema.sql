-- Schema for Unit 4 MySQL Practicals (Questions 16 to 20)
-- Target Database: ge_practical (or rc_campus)

CREATE DATABASE IF NOT EXISTS ge_practical CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE ge_practical;

DROP TABLE IF EXISTS students;
DROP TABLE IF EXISTS departments;

CREATE TABLE departments (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE students (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    roll VARCHAR(20) NOT NULL UNIQUE,
    name VARCHAR(100) NOT NULL,
    course VARCHAR(100) NOT NULL,
    marks DECIMAL(5,2) NOT NULL,
    department_id INT UNSIGNED DEFAULT 1,
    FOREIGN KEY (department_id) REFERENCES departments(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Seed Sample Data
INSERT INTO departments (id, name) VALUES
(1, 'Computer Science'),
(2, 'Commerce'),
(3, 'Mathematics');

INSERT INTO students (roll, name, course, marks, department_id) VALUES
('24020107032', 'Kush Kumar', 'B.Voc. SD', 95.50, 1),
('24020107010', 'Aman Sharma', 'B.Sc. (H) CS', 88.00, 1),
('24020107015', 'Neha Gupta', 'B.Com (H)', 91.00, 2),
('24020107022', 'Rohan Verma', 'B.Sc. (H) Maths', 76.50, 3),
('24020107044', 'Priya Singh', 'B.Voc. SD', 84.00, 1);

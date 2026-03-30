-- schema_creation.sql

CREATE DATABASE IF NOT EXISTS Student;
USE Student;

-- students table
CREATE TABLE students (
    id INT PRIMARY KEY,
    name VARCHAR(50),
    age INT,
    gender VARCHAR(10),
    department VARCHAR(50)
);

-- courses table
CREATE TABLE courses (
    course_id INT PRIMARY KEY,
    course_name VARCHAR(20)
);

-- marks table
CREATE TABLE marks (
    student_id INT,
    course_id INT,
    marks INT
);

-- insert into students
INSERT INTO students VALUES
(1, 'Amit', 20, 'Male', 'Computer'),
(2, 'Neha', 21, 'Female', 'IT'),
(3, 'Rahul', 22, 'Male', 'Computer'),
(4, 'Sneha', 19, 'Female', 'ENTC'),
(5, 'Arjun', 23, 'Male', 'Computer');

-- insert into courses
INSERT INTO courses VALUES
(101, 'DBMS'),
(102, 'OS'),
(103, 'Maths');

-- insert into marks
INSERT INTO marks VALUES
(1, 101, 85),
(1, 102, 78),
(1, 103, 90),
(2, 101, 88),
(2, 102, 92),
(2, 103, 81),
(3, 101, 70),
(3, 102, 75),
(3, 103, 80),
(4, 101, 60),
(4, 102, 65),
(4, 103, 70),
(5, 101, 95),
(5, 102, 89),
(5, 103, 93);
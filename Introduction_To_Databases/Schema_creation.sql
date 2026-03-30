-- queries_and_joins.sql

USE Student;

-- display all students
SELECT * FROM students;

-- display all courses
SELECT * FROM courses;

-- display all marks
SELECT * FROM marks;

-- update command
UPDATE students
SET name = 'Priya'
WHERE id = 1;

-- delete command
DELETE FROM students
WHERE id = 1;

-- inner join: students who have marks
SELECT s.name, c.course_name, m.marks
FROM students s
INNER JOIN marks m ON s.id = m.student_id
INNER JOIN courses c ON m.course_id = c.course_id;

-- left join: all students, including those without marks
SELECT s.name, c.course_name, m.marks
FROM students s
LEFT JOIN marks m ON s.id = m.student_id
LEFT JOIN courses c ON m.course_id = c.course_id;

-- students who do not have marks
SELECT s.id, s.name
FROM students s
LEFT JOIN marks m ON s.id = m.student_id
WHERE m.student_id IS NULL;

-- right join
SELECT s.name, c.course_name, m.marks
FROM students s
RIGHT JOIN marks m ON s.id = m.student_id
RIGHT JOIN courses c ON m.course_id = c.course_id;

-- cross join
SELECT s.name, c.course_name
FROM students s
CROSS JOIN courses c;

-- self join: students in same department
SELECT s1.name AS Student1, s2.name AS Student2, s1.department
FROM students s1
JOIN students s2
ON s1.department = s2.department
AND s1.id < s2.id;

-- print students with marks in increasing order
SELECT students.name, marks.marks
FROM students
JOIN marks ON students.id = marks.student_id
ORDER BY marks.marks ASC;

-- filtering queries
SELECT * FROM students
WHERE department = 'Computer';

SELECT * FROM students
WHERE age > 20;

SELECT * FROM students
WHERE name LIKE 'A%';

SELECT * FROM students
WHERE age BETWEEN 20 AND 22;

SELECT * FROM marks
WHERE marks > 80;

-- aggregation queries
SELECT student_id, AVG(marks) AS avg_marks
FROM marks
GROUP BY student_id;

SELECT course_id, MAX(marks) AS highest_marks
FROM marks
GROUP BY course_id;

SELECT department, COUNT(*) AS total_students
FROM students
GROUP BY department;

SELECT student_id, SUM(marks) AS total_marks
FROM marks
GROUP BY student_id
ORDER BY total_marks DESC;
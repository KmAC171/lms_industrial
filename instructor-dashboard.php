<?php

session_start();
include 'db.php';

$page = 'instructor_dashboard';

$instructor_id = $_SESSION['user_id'];

$course_query = "
SELECT * FROM instructor_courses
WHERE instructor_id='$instructor_id'
";

$courses = mysqli_query($conn, $course_query);

$activity_query = "
SELECT * FROM instructor_activities
WHERE instructor_id='$instructor_id'
ORDER BY created_at DESC
LIMIT 5
";

$activities = mysqli_query($conn, $activity_query);

$stats_query = "
SELECT

SUM(students) AS total_students,
COUNT(id) AS total_courses,
SUM(revenue) AS total_revenue,
AVG(rating) AS avg_rating

FROM instructor_courses
WHERE instructor_id='$instructor_id'
";

$stats = mysqli_fetch_assoc(mysqli_query($conn, $stats_query));

?>
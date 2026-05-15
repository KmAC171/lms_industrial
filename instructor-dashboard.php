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
<!DOCTYPE html>
<html lang="en">
    <head>
         <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Instructor Dashboard</title>

    <link rel="stylesheet" href="instructor-dashboard.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    </head>
</html>
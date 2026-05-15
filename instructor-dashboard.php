<?php

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$name = $_SESSION['user_name'];
$role = $_SESSION['user_role'];
include 'db.php';

$page = 'instructor_dashboard';

$instructor_id = $_SESSION['user_id'];

$course_query = "
SELECT * FROM courses
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

FROM courses
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

<body>
    <div class="dashboard">
        <div class="sidebar">
            <div class="logo">
                <div class="logo-box">
                    <i class="fa-solid fa-book-open"></i>
                </div>
                <h2>LearnHub</h2>
            </div>
            <ul class="menu">

                <li class="<?= ($page == 'instructor-dashboard') ? 'active' : '' ?>">
                    <a href="instructor-dashboard.php">
                        <i class="fa-solid fa-table-cells-large"></i>
                        Dashboard
                    </a>
                </li>

                <li class="<?= ($page == 'courses') ? 'active' : '' ?>">
                    <a href="student-courses.php">
                        <i class="fa-solid fa-book"></i>
                        Courses
                    </a>
                </li>

                <li class="<?= ($page == 'my-courses') ? 'active' : '' ?>">
                    <a href="instructor-courses.php">
                        <i class="fa-solid fa-book"></i>
                        My Courses
                    </a>
                </li>

                <li class="<?= ($page == 'students') ? 'active' : '' ?>">
                    <a href="instructor-students.php">
                        <i class="fa-solid fa-users"></i>
                        Students
                    </a>
                </li>

                <li class="<?= ($page == 'analytics') ? 'active' : '' ?>">
                    <a href="instructor-analytics.php">
                        <i class="fa-solid fa-chart-line"></i>
                        Analytics
                    </a>
                </li>

                <li class="<?= ($page == 'calendar') ? 'active' : '' ?>">
                    <a href="instructor-calendar.php">
                        <i class="fa-regular fa-calendar"></i>
                        Calendar
                    </a>
                </li>

                <li class="<?= ($page == 'messages') ? 'active' : '' ?>">
                    <a href="instructor-messages.php">
                        <i class="fa-solid fa-message"></i>
                        Messages
                    </a>
                </li>
            </ul>

            <div class="profile">
                <div class="profile-info">
                    <div class="avatar">
                        <?php echo strtoupper(substr($_SESSION['user_name'], 0, 2)); ?>
                    </div>
                    <div class="user-detail">
                        <h4><?php echo $name; ?></h4>
                        <span><?php echo $role; ?></span>
                    </div>
                    <a href="instructor-profile-settings.php" class="settings-btn">

                        <i class="fa-solid fa-gear"></i>

                    </a>
                </div>
                <a href="logout.php" class="logout-btn">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    Sign Out
                </a>
            </div>
        </div>
        <div class="main">
            
        </div>
    </div>
</body>

</html>
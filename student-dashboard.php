<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$name = $_SESSION['user_name'];
$role = $_SESSION['user_role'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Dashboard</title>

    <link rel="stylesheet" href="student-dashboard.css">

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
                <li class="active">
                    <i class="fa-solid fa-table-cells-large"></i>
                    Dashboard
                </li>
                <li>
                    <i class="fa-solid fa-book"></i>
                    Courses
                </li>
                <li>
                    <i class="fa-regular fa-calendar"></i>
                    Calendar
                </li>

                <li>
                    <i class="fa-regular fa-message"></i>
                    Messages
                </li>

                <li>
                    <i class="fa-solid fa-trophy"></i>
                    Achievements
                </li>
            </ul>

            <div class="profile">
                <div class="profile-info">
                    <div class="avatar">
                        <?php echo strtoupper(substr($name, 0, 2)); ?>
                    </div>

                    <div class="user-detail">
                        <h4><?php echo $name; ?></h4>
                        <span><?php echo $role; ?></span>
                    </div>
                </div>

                <a href="logout.php" class="logout-btn">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    Sign Out
                </a>
            </div>
        </div>

        // main content

        <div class="main">
            <div class="topbar">
                <div>
                    <h1>Welcome back, <?php echo $name; ?>!</h1>
                    <p>Continue your learning journey!</p>
                </div>
                <div class="top-icons">
                    <i class="fa-regular fa-moon"></i>
                    <i class="fa-regular fa-bell"></i>
                    <i class="fa-regular fa-user"></i>
                </div>
            </div>

            <div class="stats">
                <div class="stat-card">
                    <div>
                        <p>Courses Enrolled</p>
                        <h2>12</h2>
                    </div>
                    <i class="fa-solid fa-book-open stat-icon blue"></i>
                </div>

                <div class="stat-card">

                    <div>
                        <p>Hours Learned</p>
                        <h2>148</h2>
                    </div>

                    <i class="fa-regular fa-clock stat-icon purple"></i>

                </div>

                <div class="stat-card">

                    <div>
                        <p>Certificates</p>
                        <h2>7</h2>
                    </div>

                    <i class="fa-solid fa-award stat-icon green"></i>

                </div>

                <div class="stat-card">

                    <div>
                        <p>Current Streak</p>
                        <h2>23</h2>
                    </div>

                    <i class="fa-solid fa-fire stat-icon orange"></i>

                </div>

            </div>

            <!-- CONTENT -->

            <div class="content-grid">
                
            </div>
        </div>

    </div>
</body>

</html>
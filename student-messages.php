<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$page = "messages";

$name = $_SESSION['user_name'];
$role = $_SESSION['user_role'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Messages</title>
    <link rel="stylesheet" href="student-messages.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <div class="dashboard">

        <div class="sidebar">
            <div>

                <div class="logo">

                    <div class="logo-box">
                        <i class="fa-solid fa-book-open"></i>
                    </div>

                    <h2>LearnHub</h2>

                </div>

                <!-- MENU -->

                <ul class="menu">
                    <li class="<?= ($page == 'dashboard') ? 'active' : '' ?>">
                        <a href="student-dashboard.php">

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

                    <li class="<?= ($page == 'calendar') ? 'active' : '' ?>">
                    <a href="student-calendar.php">

                        <i class="fa-regular fa-calendar"></i>
                        Calendar

                    </a>
                </li>

                <li class="<?= ($page == 'messages') ? 'active' : '' ?>">
                    <a href="student-messages.php">

                        <i class="fa-regular fa-message"></i>
                        Messages

                    </a>
                </li>

                <li class="<?= ($page == 'achievements') ? 'active' : '' ?>">
                    <a href="student-achievements.php">

                        <i class="fa-solid fa-trophy"></i>
                        Achievements

                    </a>
                </li>

                </ul>

            </div>

            <div class="profile">
                <div class="profile-info">
                    <div class="avatar">
                        <?php echo strtoupper(substr($name, 0, 2)); ?>
                    </div>

                    <div class="user-detail">
                        <h4><?php echo $name; ?></h4>
                        <span><?php echo $role; ?></span>
                    </div>
                    <a href="profile-settings.php" class="settings-btn">

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
            <div class="topbar">
                <div>

                <h1>My Messages</h1>

                <p>Communicate with your instructors and peers</p>

            </div>
            <div class="top-icons">
                    <i class="fa-regular fa-moon"></i>
                    <i class="fa-regular fa-bell"></i>
                    <i class="fa-regular fa-user"></i>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
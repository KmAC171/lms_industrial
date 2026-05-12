<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$page = "calendar";

$name = $_SESSION['user_name'];
$role = $_SESSION['user_role'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Calendar</title>
    <link rel="stylesheet" href="student-calender.css">
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

                    <h1>My Calendar</h1>

                    <p>View and manage your schedule</p>

                </div>
                <div class="top-icons">
                    <i class="fa-regular fa-moon"></i>
                    <i class="fa-regular fa-bell"></i>
                    <i class="fa-regular fa-user"></i>
                </div>
            </div>
            <!--calender layout-->
            <div class="calender-layout">
                <!--left-->
                <div class="calender-box">
                    <div class="calender-top">
                        <h3>May 2026</h3>
                        <div class="calender-nav">
                            <button> <i class="fa-solid fa-chevron-left"></i></button>
                            <button> <i class="fa-solid fa-chevron-right"></i></button>
                        </div>
                    </div>
                    <!--days-->
                    <div class="weekdays">
                        <span>Sun</span>
                        <span>Mon</span>
                        <span>Tue</span>
                        <span>Wed</span>
                        <span>Thu</span>
                        <span>Fri</span>
                        <span>Sat</span>
                    </div>
                    <!--dates-->
                    <div class="calender-grid">
                        <?php for ($i = 1; $i <= 31; $i++) { ?>
                            <div class="day <?= ($i == 7) ? 'active-day' : '' ?>">
                                <span><?= $i ?></span>
                                <?php if ($i == 7) { ?>
                                    <div class="dot blue"></div>
                                <?php } ?>
                                <?php if ($i == 8) { ?>
                                    <div class="dot orange"></div>
                                <?php } ?>

                                <?php if ($i == 9) { ?>
                                    <div class="dot purple"></div>
                                <?php } ?>

                                <?php if ($i == 10) { ?>
                                    <div class="dot green"></div>
                                <?php } ?>

                                <?php if ($i == 15) { ?>
                                    <div class="dot red"></div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <!-- RIGHT -->
            <div class="calender-sidebar">
                <!--events-->
                <div class="calender-widget">
                    <h3>EVENTS - may7</h3>
                    <p class="event-count">1 event</p>
                    <div class="event-card">
                        <div class="event-icon blue-bg">
                            <i class="fa-solid fa-video"></i>
                        </div>
                        <div>
                            <h4>
                                Live Q&A: React Hooks Deep Dive
                            </h4>
                            <p>
                                🕒 15:00 • 1h 30m
                            </p>

                            <p>
                                Advanced React Patterns
                            </p>

                            <p>
                                📍 Zoom
                            </p>

                            <p>
                                👥 45/100 attendees
                            </p>
                        </div>
                    </div>
                </div>

                <!-- UPCOMING -->
                <div class="calender-widget">
                    <h3>Upcoming This Week</h3>
                    <div class="upcomig-item">
                        <div class="small-icon blue-bg">
                            <i class="fa-solid fa-video"></i>
                        </div>
                        <div>

                            <h4>
                                Live Q&A: React Hooks Deep Dive
                            </h4>

                            <p>07 May, 15:00</p>

                        </div>
                    </div>
                    <div class="upcoming-item">

                        <div class="small-icon orange-bg">
                            <i class="fa-solid fa-file"></i>
                        </div>

                        <div>

                            <h4>
                                Assignment Due: JavaScript Project
                            </h4>

                            <p>08 May, 23:59</p>

                        </div>

                    </div>
                     <div class="upcoming-item">

                        <div class="small-icon purple-bg">
                            <i class="fa-solid fa-chalkboard-user"></i>
                        </div>

                        <div>

                            <h4>
                                Workshop: Advanced CSS Techniques
                            </h4>

                            <p>09 May, 14:00</p>

                        </div>

                    </div>
                     <div class="upcoming-item">

                        <div class="small-icon green-bg">
                            <i class="fa-solid fa-circle-question"></i>
                        </div>

                        <div>

                            <h4>
                                Quiz: Web Development Basics
                            </h4>

                            <p>10 May, 10:00</p>

                        </div>

                    </div>
                    
                </div>
            </div>
        </div>
    </div>

</body>

</html>
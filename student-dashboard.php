<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
$page = "dashboard";
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
                <div>
                    <div class="section-title">
                        <h2>Continue Learning!</h2>
                        <span>View All</span>
                    </div>

                    <div class="course-card">
                        <div class="course-image blue-bg">
                            <span class="tag">Develeopment</span>
                            <div class="play-btn">
                                <i class="fa-solid fa-play"></i>
                            </div>
                        </div>
                        <div class="course-content">
                            <h3>Advanced React Patterns</h3>
                            <p>
                                <i class="fa-regular fa-clock"></i>
                                2h 15m remaining
                            </p>
                            <div class="progress-label">
                                <span>Progress</span>
                                <span>67%</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress" style="width:67%"></div>
                            </div>
                        </div>
                    </div>

                    <div class="course-card">
                        <div class="course-image purple-bg">

                            <span class="tag">Design</span>

                            <div class="play-btn">
                                <i class="fa-solid fa-play"></i>
                            </div>

                        </div>

                        <div class="course-content">

                            <h3>UI/UX Design Masterclass</h3>

                            <p>
                                <i class="fa-regular fa-clock"></i>
                                1h 45m remaining
                            </p>

                            <div class="progress-label">
                                <span>Progress</span>
                                <span>34%</span>
                            </div>

                            <div class="progress-bar">

                                <div class="progress" style="width:34%"></div>

                            </div>

                        </div>
                    </div>
                    <div class="course-card">
                        <div class="course-image green-bg">
                            <span class="tag">AI/ML</span>
                            <div class="play-btn">
                                <i class="fa-solid fa-play"></i>
                            </div>
                        </div>
                        <div class="course-content">
                            <h3>Machine Learning Fundamentals</h3>
                            <p>
                                <i class="fa-regular fa-clock"></i>
                                45m remaining
                            </p>
                            <div class="progress-label">
                                <span>Progress</span>
                                <span>89%</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress" style="width:89%"></div>
                            </div>
                        </div>
                    </div>

                    <div class="recommendations">

                        <div class="recommend-header">

                            <div class="recommend-title">

                                <div class="ai-icon">
                                    <i class="fa-solid fa-brain"></i>
                                </div>

                                <div>

                                    <h2>AI Recommendations</h2>

                                    <p>Courses curated just for you</p>

                                </div>

                            </div>

                        </div>

                        <div class="recommend-grid">

                            <!-- CARD -->

                            <div class="recommend-card">

                                <div class="match-row">

                                    <span class="match-badge">95% Match</span>

                                    <i class="fa-solid fa-bolt bolt"></i>

                                </div>

                                <h3>TypeScript Deep Dive</h3>

                                <p>Sarah Chen</p>

                                <div class="card-footer">

                                    <span>
                                        ⭐ 4.9
                                    </span>

                                    <span>
                                        12.5k students
                                    </span>

                                </div>

                            </div>

                            <!-- CARD -->

                            <div class="recommend-card">

                                <div class="match-row">

                                    <span class="match-badge">92% Match</span>

                                    <i class="fa-solid fa-bolt bolt"></i>

                                </div>

                                <h3>System Design Interview Prep</h3>

                                <p>Alex Morgan</p>

                                <div class="card-footer">

                                    <span>
                                        ⭐ 4.8
                                    </span>

                                    <span>
                                        8.2k students
                                    </span>

                                </div>

                            </div>

                            <!-- CARD -->

                            <div class="recommend-card">

                                <div class="match-row">

                                    <span class="match-badge">88% Match</span>

                                    <i class="fa-solid fa-bolt bolt"></i>

                                </div>

                                <h3>Next.js Full-Stack Development</h3>

                                <p>Michael Zhang</p>

                                <div class="card-footer">

                                    <span>
                                        ⭐ 4.9
                                    </span>

                                    <span>
                                        15.3k students
                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>
                </div>

                <div class="side-widgets">
                    <div class="widget">
                        <h3>
                            <i class="fa-regular fa-calendar"></i>
                            Upcoming Classes
                        </h3>

                        <div class="class-item">

                            <h4>Live Q&A: React Hooks</h4>
                            <p>Today, 3:00 PM</p>

                        </div>

                        <div class="class-item">

                            <h4>Workshop: Advanced CSS</h4>
                            <p>Tomorrow, 2:00 PM</p>

                        </div>

                        <div class="class-item">

                            <h4>Code Review Session</h4>
                            <p>May 9, 10:00 AM</p>

                        </div>

                    </div>
                    <div class="widget">
                        <h3>
                            <i class="fa-solid fa-bullseye"></i>
                            Weekly Goals
                        </h3>

                        <div class="goal">

                            <div class="goal-text">
                                <span>Complete 3 courses</span>
                                <span>2/3</span>
                            </div>

                            <div class="progress-bar">
                                <div class="progress" style="width:70%"></div>
                            </div>

                        </div>
                        <div class="goal">

                            <div class="goal-text">
                                <span>Study 10 hours</span>
                                <span>7.5/10</span>
                            </div>

                            <div class="progress-bar">
                                <div class="progress" style="width:75%"></div>
                            </div>

                        </div>
                        <div class="goal">

                            <div class="goal-text">
                                <span>Earn 2 Certificates</span>
                                <span>1/2</span>
                            </div>

                            <div class="progress-bar">
                                <div class="progress" style="width:50%"></div>
                            </div>

                        </div>
                    </div>
                    <div class="leaderboard">

                        <div class="leaderboard-header">

                            <h3>
                                <i class="fa-solid fa-arrow-trend-up"></i>
                                Leaderboard
                            </h3>

                            <p>Top learners this week</p>

                        </div>

                        <!-- ITEM -->

                        <div class="leader-item">

                            <div class="leader-left">

                                <div class="rank gold">1</div>

                                <span>Sarah Johnson</span>

                            </div>

                            <div class="score">

                                ⚡ 2450

                            </div>

                        </div>

                        <!-- ITEM -->

                        <div class="leader-item active-user">

                            <div class="leader-left">

                                <div class="rank silver">2</div>

                                <span>You</span>

                            </div>

                            <div class="score">

                                ⚡ 2180

                            </div>

                        </div>

                        <!-- ITEM -->

                        <div class="leader-item">

                            <div class="leader-left">

                                <div class="rank bronze">3</div>

                                <span>Mike Chen</span>

                            </div>

                            <div class="score">

                                ⚡ 1920

                            </div>

                        </div>

                        <button class="leader-btn">

                            View Full Leaderboard

                        </button>

                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>
<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$page = "courses";

$name = $_SESSION['user_name'];
$role = $_SESSION['user_role'];

$search = "";
if(isset($_GET['search'])){
    $search = $_GET['search'];
}

$category = "";
if(isset($_GET['category'])){
    $category = $_GET['category'];
}

$sort = "";
if(isset($_GET['sort'])){
    $sort = $_GET['sort'];
}

$query = "SELECT * FROM courses WHERE 1";

if($search != ""){
    $query .= " AND (
    title LIKE '%$search%' OR
    instructor LIKE '%$search%' OR
    category LIKE '%$search%'
    )";
}

if($category != "" && $category != "All Courses"){
    $query .= " AND category='$category'";
}

if($sort == "rating"){
    $query .= " ORDER BY rating DESC";
}
else if($sort == "students"){
    $query .= " ORDER BY students DESC";
}
else {
    $query .= " ORDER BY created_at DESC";
}

$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Courses</title>
    <link rel="stylesheet" href="student-courses.css?v=<?php echo time(); ?>">
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
                        <a href="courses.php">

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
                    <h1>My Courses</h1>
                    <p>Manage and continue your enrolled courses</p>
                </div>
                <div class="top-icons">
                    <i class="fa-regular fa-moon"></i>
                    <i class="fa-regular fa-bell"></i>
                    <i class="fa-regular fa-user"></i>
                </div>
            </div>


            <!-- SEARCH -->

            <form method="GET" class="search-bar">
                <div class="search-box">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" name="search" placeholder="Search courses, instructors, or topics..."
                        value="<?= $search ?>">

                </div>

                <!-- FILTER -->

                <select name="category" class="filter-select">
                    <option value="">All Categories</option>
                    <option value="Development">Development</option>
                    <option value="Design">Design</option>
                    <option value="Business">Business</option>
                    <option value="AI & ML">AI & ML</option>
                </select>

                <!-- SORT -->

                <select name="sort" class="filter-select">
                    <option value="">Newest</option>
                    <option value="rating">Highest Rated</option>
                    <option value="students">Most Students</option>
                </select>

                <button type="submit" class="search-btn">Apply</button>
            </form>

            <!-- CATEGORY TABS -->

            <div class="category-tabs">
                <a href="student-courses.php" class="tab active">All Courses</a>
                <a href="courses.php?category=Development" class="tab">
                    Development
                </a>

                <a href="student-courses.php?category=Design" class="tab">
                    Design
                </a>

                <a href="student-courses.php?category=Business" class="tab">
                    Business
                </a>

                <a href="student-courses.php?category=AI & ML" class="tab">
                    AI & ML
                </a>
                <a href="student-courses.php?category=Marketing" class="tab">
                    Marketing
                </a>
                <a href="student-courses.php?category=Data Science" class="tab">
                    Data Science
                </a>
            </div>
            <p class="course-count">
                Showing <?= mysqli_num_rows($result) ?> courses
            </p>

            <!--Courses-->
            <div class="courses-grid">
                <?php while($course = mysqli_fetch_assoc($result)) { ?>
                <div class="course-box">
                    <div class="course-thumb">
                        <span class="course-tag">
                            <?= $course['featured_tag'] ?>
                        </span>
                    </div>
                    <div class="course-info">
                        <h3><?= $course['title'] ?></h3>
                        <p><?= $course['description'] ?></p>
                        <h4><?= $course['instructor'] ?></h4>
                        <div class="course-meta">
                             <span>
                                ⭐ <?= $course['rating'] ?>
                            </span>

                            <span>
                                👥 <?= number_format($course['students']/1000,1) ?>k
                            </span>

                            <span>
                                🕒 <?= $course['duration'] ?>
                            </span>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>

        </div>
    </div>
</body>

</html>
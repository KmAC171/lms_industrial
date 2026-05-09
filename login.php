<?php

session_start();

include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    
    $query = "SELECT * FROM users WHERE email='$email'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {

        $user = mysqli_fetch_assoc($result);

        
        if ($password == $user['password']) {

            
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_role'] = $user['role'];

           
            if ($user['role'] == 'student') {

                header("Location: student-dashboard.php");

            } elseif ($user['role'] == 'instructor') {

                header("Location: instructor-dashboard.php");

            } elseif ($user['role'] == 'admin') {

                header("Location: admin-dashboard.php");

            }

            exit();

        } else {

            echo "Incorrect Password";

        }

    } else {

        echo "Email Not Found";

    }

}
?>
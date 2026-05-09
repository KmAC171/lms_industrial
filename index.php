<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

</head>

<body>
    <div class="logo">
        <div class="logo-box">📘</div>
        <h1>LearnHub</h1>
    </div>
    <div class="subtitle">
        <p>Choose your role and sign in to continue</p>
    </div>
    <div class="container">
        <div class="card">

            <h2>Sign In</h2>
            <p>Enter your credentials to access your account.</p>
            
            <form action="login.php" method="POST">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Enter your Email" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter your password" required>
                </div>

                <button class="btn" type="submit">Sign In</button>
            </form>

            <div class="forgot">
                <a href="#">Forgot Password?</a>
            </div>

        </div>
    </div>
</body>

</html>
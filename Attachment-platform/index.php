<?php
session_start();
if (!isset($_SESSION["csrf_token"])) {
    $_SESSION["csrf_token"] = bin2hex(random_bytes(32));
}
$errors = isset($_SESSION["error"]) ? $_SESSION["error"] : "";
unset($_SESSION["error"]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <header>
        <a href="/">Home</a>
        <nav>
            <ul>
                <li><a href="">Login</a></li>
                <li><a href="">Register</a></li>
                <li><a href="">Help</a></li>
            </ul>
        </nav>
    </header>
    <section>
        <h1>Welcome to Our Insurance Login Page</h1>
        <div class="form-section">
            <form action="./db_connect/process_login.php" method="post" id="login-form">
                <div class="input-field">
                    <label for="regNo">Username</label>
                    <input type="text" id="regNo" placeholder="Enter Username" name="reg-name">
                </div>

                <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION["csrf_token"]); ?>">

                <div class="input-field">
                    <label for="password">Password</label>
                    <div class="show-pass">
                        <input type="password" id="password" placeholder="Enter password" name="pwd">
                        <i class="fa fa-eye" id="togglePassword"></i>
                    </div>
                </div>
                <?php if (!empty($errors)): ?>
                    <div class="message-area"><?php echo htmlspecialchars($errors); ?></div>
                <?php endif ?>
                <button type="submit">Login</button>

                <div class="reset">
                    <p>Forgot Password?</p>
                    <a href="">Reset here</a>
                </div>
            </form>
        </div>
    </section>
    <script src="js/script.js"></script>
</body>

</html>
<?php
session_start();

if (
    !isset($_SESSION["user_id"]) || !isset($_SESSION["status"]) || !isset($_SESSION["date"]) ||
    !isset($_SESSION["csrf_token"]) || !isset($_SESSION["students_reg"]) || !isset($_SESSION["username"])
    || !isset($_SESSION["cleared"])
) {
    header("Location: ../index.php");
    die("invalid request");
}

if (!isset($_SESSION["csrf_token"])) {
    $_SESSION["csrf_token"] = bin2hex(random_bytes(32));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <header>
        <a href="/">Home</a>
        <nav>
            <ul>
                <li><a href="">Help</a></li>
                <li><a href=""><?php echo htmlspecialchars($_SESSION["username"]); ?></a></li>
            </ul>
        </nav>
    </header>

    <section>
        <h1>Welcome to Student Insurance Page</h1>
        <div class="form-section">
            <div class="insurance">
                <table>
                    <thead>
                        <tr>
                            <th>Reg No</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo htmlspecialchars($_SESSION["students_reg"]); ?></td>
                            <td class="status"><?php echo htmlspecialchars($_SESSION["date"]); ?></td>
                            <td class="status"><?php echo htmlspecialchars($_SESSION["status"] ? "Pending" : "Approved") ?></td>
                            <td><a href="#">Download</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <script src="./../js/autoload.js"></script>
</body>

</html>
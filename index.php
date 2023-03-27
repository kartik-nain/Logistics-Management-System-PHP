<?php
session_start();

// Check if the form has been submitted
if (isset($_POST['user_name']) && isset($_POST['passwrd'])) {

    // Retrieve the submitted username and password
    $username = $_POST['user_name'];
    $password = $_POST['passwrd'];

    // Check if the submitted username and password match the hardcoded values
    if ($username === "admin123" && $password === "password") {

        // Store the username in a session variable
        $_SESSION['user_name'] = $username;

        // Redirect to the homepage
        header("Location: public/home_page.php");
        exit;
    } else {
        // If the submitted username and password do not match the hardcoded values, show an error message
        $error_message = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="public/css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>

<body>
    <div class="container">
    <main>
        <h1>Login:</h1>
        <div id="form_data">
            <form method="post">
                <label for="username">Username: </label><br>
                <input type="text" id="username" name="user_name" REQUIRED><br><br>
                <label for="password">Password: </label><br>
                <input type="password" id="password" name="passwrd" REQUIRED><br><br>
                <div class="button"><button type="submit"  class="btn btn-primary">Login</button></div>
                <?php if (isset($error_message)): ?>
                    <br>
                    <div class="alert alert-warning" role="alert">
                        <?php echo $error_message; ?>
                    </div>
                <?php endif; ?>
            </form>
        </div>
    </main>

    <p class="validator">
        <a href="http://jigsaw.w3.org/css-validator/check/referer">
            <img style="border:0;width:88px;height:31px" src="http://jigsaw.w3.org/css-validator/images/vcss-blue"
                alt="Valid CSS!">
        </a>
    </p>

    </div>
</body>

</html>
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
        $error_message = "Invalid username or password";
    }
}
?>

<?php include "public/templates/header.php"; ?>
<title>Login Page</title>
<link rel="stylesheet" href="public/css/index.css">
</head>

<body>

    <main>
        <h1>Login:</h1>
        <div id="form_data">
            <form method="post">
                <label for="username">Username: </label><br>
                <input type="text" id="username" name="user_name" REQUIRED><br><br>
                <label for="password">Password: </label><br>
                <input type="password" id="password" name="passwrd" REQUIRED><br><br><br>
                <div class="button"><button type="submit">Login</button></div>
                <?php if (isset($error_message)): ?>
                    <p>
                        <?php echo $error_message; ?>
                    </p>
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


    <?php include "public/templates/footer.php"; ?>
<?php
session_start();

// Check if the form has been submitted
if (isset($_POST['user_name']) && isset($_POST['passwrd'])) {

    // Retrieve the submitted username and password
    $user_name = $_POST['user_name'];
    $passwrd = $_POST['passwrd'];

    require "./config.php";

    // Construct the SQL query to fetch the data from the table
    $sql = "SELECT username, password FROM login where username ='" . $user_name . "' AND password ='" . $passwrd . "'";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Check if there are any records in the table
    if (mysqli_num_rows($result) > 0) {
        // Store the username in a session variable
        $_SESSION['user_name'] = $user_name;

        // Redirect to the homepage
        header("Location: public/home_page.php");
        exit;

    } else {
        // If the submitted username and password do not match the hardcoded values, show an error message
        $error_message = "No record found.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="public/css/index.css">
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
                <div class="button"><input type="submit" class="submitBtn" name='submit' value="Login" ></div>
                <?php if (isset($error_message)): ?>
                    <br>
                    <div class="alert alert-warning" role="alert">
                        <?php echo $error_message; ?>
                    </div>
                <?php endif; ?>
            </form>
            <br>New User? <a href='register.php'><div class="button"><input type="submit" class="submitBtn" name='submit' value="Register" ></div></a>
        </div>
    </main>

    </div>
</body>

</html>
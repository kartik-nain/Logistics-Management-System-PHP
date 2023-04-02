<?php
session_start();

// Check if the form has been submitted
if (isset($_POST['user_name']) && isset($_POST['passwrd'])) {

    // Retrieve the submitted username and password
    $user_name = $_POST['user_name'];
    $passwrd = $_POST['passwrd'];

    require "./config.php";

    // Check if the username already exists in the database
    $sql_check = "SELECT * FROM login WHERE username = '" . $user_name . "'";
    $result_check = mysqli_query($conn, $sql_check);

    if (mysqli_num_rows($result_check) > 0) {
        // Username already exists, display error message
        $error_message = "Username already exists. Please choose a different username.";
    } else {
        // Construct the SQL query to insert the data in the table
        $sql_insert = "INSERT INTO login VALUES('" . $user_name . "', '" . $passwrd . "')";

        // Insert the data into the table
        if (mysqli_query($conn, $sql_insert)) {
            // Insert successful, display success message
            $error_message = "Register Successful. 
            <br><a href='index.php' class='btn btn-primary'>Go to Login Page.</a>";
        } else {
            // Insert failed, display error message
            $error_message = "Registration failed. Please try again later.";
        }
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register Page</title>
    <link rel="stylesheet" href="public/css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <main>
            <h1>Register:</h1>
            <div id="form_data">
                <form method="post">
                    <label for="username">Username: </label><br>
                    <input type="text" id="username" name="user_name" REQUIRED><br><br>
                    <label for="password">Password: </label><br>
                    <input type="password" id="password" name="passwrd" REQUIRED><br><br>
                    <div class="button"><button type="submit" class="btn btn-primary">Register</button></div>
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
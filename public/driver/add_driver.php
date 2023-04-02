<?php include "../templates/header.php"; ?>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/footer.css">
    <title> Add Driver</title>
</head>
<body>
    <header>
        <?php include "../templates/navbar.php"; ?>
    </header>
    <main>
<?php

if (isset($_POST['submit'])) {

    class Driver
    {
        public $driver_id;
        public $name;
        public $address;
        public $email;
        public $phone;

        public function Driver()
        {
            $this->driver_id = $_POST['driver_id'];
            $this->name = $_POST['name'];
            $this->address = $_POST['address'];
            $this->email = $_POST['email'];
            $this->phone = $_POST['phone'];
        }
    }

    require "../../config.php";
    
    $driver = new Driver();
    $driver->Driver();
    // Construct the SQL query
    $sql = "INSERT INTO driver 
        VALUES ('$driver->driver_id', '$driver->name', '$driver->address', '$driver->email', '$driver->phone')";

    //Execute the query
    if (mysqli_query($conn, $sql)) {
        $add_message = "New Driver added successfully.";
    } else {
        echo "Error creating record: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

<h2>Add a New Driver</h2>
<form method="post">
        <label for="driver_id" >Driver ID:</label>
            <input type="text" name="driver_id"  maxlength="8" required><br><br>
        <label for="name" >Name:</label>
            <input type="text" name="name" maxlength="30" required><br><br>
        <label for="address" >Address:</label>
            <input type="text" name="address"  maxlength="30" required><br><br>
        <label for="email" >Email:</label>
            <input type="email" name="email" maxlength="30" required><br><br>
        <label for="phone">Phone No.:</label>
            <input type="tel" name="phone"  minLength="10" maxLength="10" required><br><br><br>
        <div class="button">
            <input type="submit" name="submit" value="Add" class="submitBtn">
        </div><br><br>
    

    <?php if (isset($add_message)): ?>
        <div class="alert alert-success" role="alert">
            <?php echo $add_message; ?>
        </div>
    <?php endif; ?>
    </main>
</form>

<?php include "../templates/footer.php"; ?>

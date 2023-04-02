<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/footer.css">
    <title> Add Customers</title>
</head>
<body>
    <header>
        <?php include "../templates/navbar.php"; ?>
    </header>
    <main>
<?php
if (isset($_POST['submit'])) {

    class Customer
    {
        public $customer_id;
        public $name;
        public $address;
        public $email;
        public $phone;

        public function Customer()
        {
            $this->customer_id = $_POST['customer_id'];
            $this->name = $_POST['name'];
            $this->address = $_POST['address'];
            $this->email = $_POST['email'];
            $this->phone = $_POST['phone'];
        }
    }

    require "../../config.php";
    
    $customer = new Customer();
    $customer->Customer();
    // Construct the SQL query
    $sql = "INSERT INTO Customer 
        VALUES ('$customer->customer_id', '$customer->name', '$customer->address', '$customer->email', '$customer->phone')";

    //Execute the query
    if (mysqli_query($conn, $sql)) {
        $add_message = "New Customer added successfully.";
    } else {
        echo "Error creating record: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
<h2>Add a New Customer</h2>
<form method="post">
        <label for="customer_id" >Customer ID:</label>
        <input type="text" name="customer_id" maxlength="8" required>
        <label for="name" >Name:</label>
        <input type="text" name="name" maxlength="30" required>
        <label for="address" >Address:</label>
        <input type="text" name="address" maxlength="30" required>
        <label for="email" >Email:</label>
        <input type="email" name="email" maxlength="30" required>
        <label for="phone" >Phone No.:</label>
        <input type="tel" name="phone" minLength="10" maxLength="10" required><br><br>
        <input type="submit" name="submit" class="submitBtn" value="Add" >
        <br><br>
    <?php if (isset($add_message)): ?>
            <?php echo $add_message; ?>
    <?php endif; ?>

</form>
</main>
<footer>
        <?php include "../templates/footer.php"; ?>
</footer>
</body>
</html>
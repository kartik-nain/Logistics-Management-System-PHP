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

<?php require "../templates/header.php"; ?>
<?php include "../templates/navbar.php"; ?>

<h2>Add a New Customer</h2>
<form method="post">
    <div class="">
        <label for="customer_id" class="">Customer ID:</label>
        <div class=" ">
            <input type="text" name="customer_id" class="" maxlength="8" required>
        </div>
    </div>

    <div class="">
        <label for="name" class="">Name:</label>
        <div class=" ">
            <input type="text" name="name" class="" maxlength="30" required>
        </div>
    </div>

    <div class="">
        <label for="address" class="">Address:</label>
        <div class=" ">
            <input type="text" name="address" class="" maxlength="30" required>
        </div>
    </div>

    <div class="">
        <label for="email" class="col-sm-2 col-form-label">Email:</label>
        <div class=" ">
            <input type="email" name="email" class=" " maxlength="30" required>
        </div>
    </div>

    <div class="">
        <label for="phone" class="col-sm-2 col-form-label">Phone No.:</label>
        <div class=" ">
            <input type="tel" name="phone" class=" " minLength="10" maxLength="10" required>
        </div>
    </div>

    <input type="submit" name="submit" value="Add" class="btn btn-primary">
    <br><br>

    <?php if (isset($add_message)): ?>
        <div class="alert alert-success" role="alert">
            <?php echo $add_message; ?>
        </div>
    <?php endif; ?>

</form>


<?php require "../templates/footer.php"; ?>
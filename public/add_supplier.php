<?php

/**
 * Use an HTML form to create a new entry in the
 * users table.
 *
 */


if (isset($_POST['submit'])) {
    
    require "../config.php";
    //require "../common.php";

        $conn = mysqli_connect($host, $username, $password, $database);

        // Check connection
        if($conn === false){
            echo("ERROR: Could not connect. "
                . mysqli_connect_error());
        }

        // Retrieve the input data from the form
        $supplier_id = $_POST['supplier_id'];
        $name = $_POST['name'];
        $customer_id = $_POST['customer_id'];
        $warehouse_id = $_POST['warehouse_id'];
        $vehicle_id = $_POST['vehicle_id'];
        $prod_id = $_POST['prod_id'];
        $prod_description = $_POST['prod_description'];
        $prod_quantity = $_POST['prod_quantity'];

        // Construct the SQL query
        $sql = "INSERT INTO supplier 
        VALUES ('$supplier_id', '$name', '$customer_id', '$warehouse_id', '$vehicle_id', '$prod_id', '$prod_description', '$prod_quantity')";

        //Execute the query
        if (mysqli_query($conn, $sql)) {
            echo "Record created successfully";
        } else {
            echo "Error creating record: " . mysqli_error($conn);
        }

    // Close the database connection
    mysqli_close($conn);
    }
?>

<?php require "templates/header.php"; ?>

<h2>Product Form</h2>
    <form method="post">
        <label for="supplier_id">Supplier ID:</label>
        <input type="text" name="supplier_id"><br>

        <label for="name">Name:</label>
        <input type="text" name="name"><br>

        <label for="customer_id">Customer ID:</label>
        <input type="text" name="customer_id"><br>

        <label for="warehouse_id">Warehouse ID:</label>
        <input type="text" name="warehouse_id"><br>

        <label for="vehicle_id">Vehicle ID:</label>
        <input type="text" name="vehicle_id"><br>

        <label for="prod_id">Product ID:</label>
        <input type="text" name="prod_id"><br>

        <label for="prod_description">Product Description:</label>
        <input type="text" name="prod_description"><br>

        <label for="prod_quantity">Product Quantity:</label>
        <input type="text" name="prod_quantity"><br>

        <input type="submit" name="submit" value="Submit">
    </form>

<a href="home_page.php">Back to home</a>

<?php require "templates/footer.php"; ?>
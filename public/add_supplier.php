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
    if ($conn === false) {
        echo ("ERROR: Could not connect. "
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
<?php include "templates/navbar.php"; ?>

    <h2>Add a New Supplier</h2>
    <form method="post">
        <div class="row mb-3">
            <label for="supplier_id" class="col-sm-2 col-form-label">Supplier ID:</label>
            <div class="col-sm-10">
                <input type="text" name="supplier_id" class="form-control">
            </div>
        </div>

        <div class="row mb-3">
            <label for="name" class="col-sm-2 col-form-label">Name:</label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control">
            </div>
        </div>

        <div class="row mb-3">
            <label for="customer_id"  class="col-sm-2 col-form-label">Customer ID:</label>
            <div class="col-sm-10">
                <input type="text" name="customer_id"  class="form-control">
            </div>
        </div>

        <div class="row mb-3">
            <label for="warehouse_id" class="col-sm-2 col-form-label">Warehouse ID:</label>
            <div class="col-sm-10">
                <input type="text" name="warehouse_id"  class="form-control">
            </div>
        </div>

        <div class="row mb-3">
            <label for="vehicle_id" class="col-sm-2 col-form-label">Vehicle ID:</label>
            <div class="col-sm-10">
                <input type="text" name="vehicle_id"  class="form-control">
            </div>
        </div>

        <div class="row mb-3">
            <label for="prod_id" class="col-sm-2 col-form-label">Product ID:</label>
            <div class="col-sm-10">
                <input type="text" name="prod_id"  class="form-control">
            </div>
        </div>

        <div class="row mb-3">
            <label for="prod_description" class="col-sm-2 col-form-label">Product Description:</label>
            <div class="col-sm-10">
                <input type="text" name="prod_description" class="form-control">
            </div>
        </div>

        <div class="row mb-3">
            <label for="prod_quantity" class="col-sm-2 col-form-label">Product Quantity:</label>
            <div class="col-sm-10">
                <input type="text" name="prod_quantity" class="form-control">
            </div>
        </div>

        <input type="submit" name="submit" value="Add" class="btn btn-primary">
    </form>


<?php require "templates/footer.php"; ?>
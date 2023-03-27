<?php

/**
 * Use an HTML form to create a new entry in the
 * users table.
 *
 */

if (isset($_POST['submit'])) {

    class Supplier
    {
        public $supplier_id;
        public $name;
        public $customer_id;
        public $warehouse_id;
        public $vehicle_id;
        public $prod_id;
        public $prod_description;
        public $prod_quantity;

        public function Supplier()
        {
            $this->supplier_id = $_POST['supplier_id'];
            $this->name = $_POST['name'];
            $this->customer_id = $_POST['customer_id'];
            $this->warehouse_id = $_POST['warehouse_id'];
            $this->vehicle_id = $_POST['vehicle_id'];
            $this->prod_id = $_POST['prod_id'];
            $this->prod_description = $_POST['prod_description'];
            $this->prod_quantity = $_POST['prod_quantity'];
        }
    }

    require "../config.php";

    $conn = mysqli_connect($host, $username, $password, $database);

    // Check connection
    if ($conn === false) {
        echo ("ERROR: Could not connect. "
            . mysqli_connect_error());
    }

    $supplier = new Supplier();
    $supplier->Supplier();
    // Construct the SQL query
    $sql = "INSERT INTO supplier 
        VALUES ('$supplier->supplier_id', '$supplier->name', '$supplier->customer_id', '$supplier->warehouse_id', '$supplier->vehicle_id', '$supplier->prod_id', '$supplier->prod_quantity', '$supplier->prod_description')";

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
            <input type="text" name="supplier_id" class="form-control"  maxlength="8">
        </div>
    </div>

    <div class="row mb-3">
        <label for="name" class="col-sm-2 col-form-label">Name:</label>
        <div class="col-sm-10">
            <input type="text" name="name" class="form-control" maxlength="30">
        </div>
    </div>

    <div class="row mb-3">
        <label for="customer_id" class="col-sm-2 col-form-label">Customer ID:</label>
        <div class="col-sm-10">
            <input type="text" name="customer_id" class="form-control"  maxlength="8">
        </div>
    </div>

    <div class="row mb-3">
        <label for="warehouse_id" class="col-sm-2 col-form-label">Warehouse ID:</label>
        <div class="col-sm-10">
            <input type="text" name="warehouse_id" class="form-control"  maxlength="8">
        </div>
    </div>

    <div class="row mb-3">
        <label for="vehicle_id" class="col-sm-2 col-form-label">Vehicle ID:</label>
        <div class="col-sm-10">
            <input type="text" name="vehicle_id" class="form-control"  maxlength="8">
        </div>
    </div>

    <div class="row mb-3">
        <label for="prod_id" class="col-sm-2 col-form-label">Product ID:</label>
        <div class="col-sm-10">
            <input type="text" name="prod_id" class="form-control"  maxlength="8">
        </div>
    </div>

    <div class="row mb-3">
        <label for="prod_description" class="col-sm-2 col-form-label">Product Description:</label>
        <div class="col-sm-10">
            <input type="text" name="prod_description" class="form-control"  maxlength="255">
        </div>
    </div>

    <div class="row mb-3">
        <label for="prod_quantity" class="col-sm-2 col-form-label">Product Quantity:</label>
        <div class="col-sm-10">
            <input type="number" name="prod_quantity" class="form-control">
        </div>
    </div>

    <input type="submit" name="submit" value="Add" class="btn btn-primary">
</form>


<?php require "templates/footer.php"; ?>
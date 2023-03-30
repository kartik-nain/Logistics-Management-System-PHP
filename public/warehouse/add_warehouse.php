<?php

if (isset($_POST['submit'])) {

    class Warehouse
    {
        public $warehouse_id;
        public $address;
        public $area_sqr_feet;

        public function Warehouse()
        {
            $this->warehouse_id = $_POST['warehouse_id'];
            $this->address = $_POST['address'];
            $this->area_sqr_feet = $_POST['area_sqr_feet'];
        }
    }

    require "../../config.php";
    
    $warehouse = new Warehouse();
    $warehouse->Warehouse();
    // Construct the SQL query
    $sql = "INSERT INTO Warehouse 
        VALUES ('$warehouse->warehouse_id', '$warehouse->address', '$warehouse->area_sqr_feet')";

    //Execute the query
    if (mysqli_query($conn, $sql)) {
        $add_message = "New Warehouse added successfully.";
    } else {
        echo "Error creating record: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

<?php require "../templates/header.php"; ?>
<?php include "../templates/navbar.php"; ?>

<h2>Add a New Warehouse</h2>
<form method="post">
    <div class="row mb-3">
        <label for="warehouse_id" class="col-sm-2 col-form-label">Warehouse ID:</label>
        <div class="col-sm-10">
            <input type="text" name="warehouse_id" class="form-control" maxlength="8" required>
        </div>
    </div>

    <div class="row mb-3">
        <label for="address" class="col-sm-2 col-form-label">Address:</label>
        <div class="col-sm-10">
            <input type="text" name="address" class="form-control" maxlength="50" required>
        </div>
    </div>

    <div class="row mb-3">
        <label for="area_sqr_feet" class="col-sm-2 col-form-label">Area (in Square Feet):</label>
        <div class="col-sm-10">
            <input type="number" name="area_sqr_feet" class="form-control" max=2147483647 required>
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
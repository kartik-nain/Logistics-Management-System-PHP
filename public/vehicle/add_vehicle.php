<?php

if (isset($_POST['submit'])) {

    class Vehicle
    {
        public $vehicle_id;
        public $driver_id;
        public $company;
        public $shipment_weight_pds;

        public function Vehicle()
        {
            $this->vehicle_id = $_POST['vehicle_id'];
            $this->driver_id = $_POST['driver_id_chkbox'];
            $this->company = $_POST['company'];
            $this->shipment_weight_pds = $_POST['shipment_weight_pds'];
        }
    }

    require "../../config.php";

    $vehicle = new Vehicle();
    $vehicle->Vehicle();
    // Construct the SQL query
    $sql = "INSERT INTO Vehicle 
        VALUES ('$vehicle->vehicle_id', '$vehicle->driver_id', '$vehicle->company', '$vehicle->shipment_weight_pds')";

    //Execute the query
    if (mysqli_query($conn, $sql)) {
        $add_message = "New Vehicle added successfully.";
    } else {
        echo "Error creating record: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

<?php require "../templates/header.php"; ?>
<?php include "../templates/navbar.php"; ?>

<h2>Add a New Vehicle</h2>
<form method="post">
    <div class="row mb-3">
        <label for="vehicle_id" class="col-sm-2 col-form-label">Vehicle ID:</label>
        <div class="col-sm-10">
            <input type="text" name="vehicle_id" class="form-control" maxlength="8" required>
        </div>
    </div>

    <div class="row mb-3">
        <label for="driver_id_chkbox" class="col-sm-2 col-form-label">Driver ID:</label>
        <div class="col-sm-10">
            <?php
                require "../../config.php";
                $list = mysqli_query($conn, "select * from Driver");
                $count = mysqli_num_rows($list)
            ?>
            <select name="driver_id_chkbox" required>
                <option value="">Select One </option>
                <?php
                for ($i = 1; $i <= $count; $i++) {
                    $row = mysqli_fetch_array($list);
                    ?>
                    <option value="<?php echo $row["driver_id"] ?>"><?php echo $row["driver_id"] ?></option>
                <?php
                }
                ?>
            </select>
        </div>
    </div>

    <div class="row mb-3">
        <label for="company" class="col-sm-2 col-form-label">Company:</label>
        <div class="col-sm-10">
            <input type="text" name="company" class="form-control" maxlength="30" required>
        </div>
    </div>

    <div class="row mb-3">
        <label for="shipment_weight_pds" class="col-sm-2 col-form-label">Shipment Weight (in Pounds):</label>
        <div class="col-sm-10">
            <input type="number" name="shipment_weight_pds" class="form-control" max=2147483648 required>
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
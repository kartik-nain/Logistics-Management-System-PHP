<?php include "../templates/header.php"; ?>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/footer.css">
    <title> Add Vehicle</title>
</head>
<body>
    <header>
        <?php include "../templates/navbar.php"; ?>
    </header>
    <main>
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
    $sql = "INSERT INTO vehicles 
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


<h2>Add a New Vehicle</h2>
<form method="post">
        <label for="vehicle_id" >Vehicle ID:</label>
            <input type="text" name="vehicle_id"  maxlength="8" required><br><br>
        <label for="driver_id_chkbox" >Driver ID:</label>
            <?php
                require "../../config.php";
                $list = mysqli_query($conn, "select * from drivers");
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
            </select><br><br>
        <label for="company" >Company:</label>
            <input type="text" name="company" maxlength="30" required><br><br>
        <label for="shipment_weight_pds" >Shipment Weight (in Pounds):</label>
            <input type="number" name="shipment_weight_pds"  max=2147483648 step="0.01" required><br><br><br>
        <div class="button">
            <input type="submit" name="submit" value="Add" class="submitBtn">
        </div><br><br>

    <?php if (isset($add_message)): ?>
        <div>
            <?php echo $add_message; ?>
        </div>
    <?php endif; ?>

</form>
</main>

<?php include "../templates/footer.php"; ?>

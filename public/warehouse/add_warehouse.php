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

<h2>Add a New Warehouse</h2>
<form method="post">
        <label for="warehouse_id" >Warehouse ID:</label>
            <input type="text" name="warehouse_id" maxlength="8" required>
        <label for="address" >Address:</label>
            <input type="text" name="address" maxlength="50" required>
        <label for="area_sqr_feet" >Area (in Square Feet):</label>
            <input type="number" name="area_sqr_feet" max=2147483647 required><br><br>
    <input type="submit" name="submit" value="Add" class="submitBtn">
    <br><br>
    <?php if (isset($add_message)): ?>
        <div>
            <?php echo $add_message; ?>
        </div>
    <?php endif; ?>

</form>
</main>
<footer>
        <?php include "../templates/footer.php"; ?>
</footer>
</body>
</html>
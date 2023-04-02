<?php include "../templates/header.php"; ?>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/footer.css">
    <title>Add Supplier</title>
</head>
<body>
    <header>
        <?php include "../templates/navbar.php"; ?>
    </header>
    <main>
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
            $this->customer_id = $_POST['customer_id_chkbox'];
            $this->warehouse_id = $_POST['warehouse_id_chkbox'];
            $this->vehicle_id = $_POST['vehicle_id_chkbox'];
            $this->prod_id = $_POST['prod_id'];
            $this->prod_description = $_POST['prod_description'];
            $this->prod_quantity = $_POST['prod_quantity'];
        }
    }

    require "../../config.php";

    $supplier = new Supplier();
    $supplier->Supplier();
    // Construct the SQL query
    $sql = "INSERT INTO suppliers 
        VALUES ('$supplier->supplier_id', '$supplier->customer_id', '$supplier->warehouse_id', '$supplier->vehicle_id', '$supplier->name', '$supplier->prod_id', '$supplier->prod_quantity', '$supplier->prod_description')";

    //Execute the query
    if (mysqli_query($conn, $sql)) {
        $add_message = "New Supplier added successfully.";
    } else {
        echo "Error creating record: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

<h2>Add a New Supplier</h2>
<form method="post">
        <label for="supplier_id" >Supplier ID:</label>
        <input type="text" name="supplier_id"  maxlength="8" required><br><br>
        <label for="name">Name:</label>
        <input type="text" name="name" maxlength="30" required><br><br>
        <label for="customer_id_chkbox" >Customer ID:</label>
            <?php
                require "../../config.php";
                $list = mysqli_query($conn, "select * from Customer");
                $count = mysqli_num_rows($list)
            ?>
            <select name="customer_id_chkbox" required>
                <option value="">Select One </option>
                <?php
                for ($i = 1; $i <= $count; $i++) {
                    $row = mysqli_fetch_array($list);
                    ?>
                    <option value="<?php echo $row["customer_id"] ?>"><?php echo $row["customer_id"] ?></option>
                <?php
                }
                ?>
            </select><br><br>
        <label for="warehouse_id_chkbox" >Warehouse ID:</label>
            <?php
                require "../../config.php";
                $list = mysqli_query($conn, "select * from Warehouse");
                $count = mysqli_num_rows($list)
            ?>
            <select name="warehouse_id_chkbox" required>
                <option value="">Select One </option>
                <?php
                for ($i = 1; $i <= $count; $i++) {
                    $row = mysqli_fetch_array($list);
                    ?>
                    <option value="<?php echo $row["warehouse_id"] ?>"><?php echo $row["warehouse_id"] ?></option>
                <?php
                }
                ?>
            </select><br><br>
        <label for="vehicle_id_chkbox" >Vehicle ID:</label>
            <?php
                require "../../config.php";
                $list = mysqli_query($conn, "select * from Vehicle");
                $count = mysqli_num_rows($list)
            ?>
            <select name="vehicle_id_chkbox" required>
                <option value="">Select One </option>
                <?php
                for ($i = 1; $i <= $count; $i++) {
                    $row = mysqli_fetch_array($list);
                    ?>
                    <option value="<?php echo $row["vehicle_id"] ?>"><?php echo $row["vehicle_id"] ?></option>
                <?php
                }
                ?>
            </select><br><br>
        <label for="prod_id">Product ID:</label>
        <input type="text" name="prod_id"  maxlength="8" required><br><br>
        <label for="prod_description" >Product Description:</label>
        <input type="text" name="prod_description"  maxlength="255" required><br><br>
        <label for="prod_quantity" >Product Quantity:</label>
        <input type="number" name="prod_quantity"  required><br><br><br>
        <div class="button">
            <input type="submit" class="submitBtn" name='submit' value="Add" >
        </div><br><br>
   

    <?php if (isset($add_message)): ?>
        <div class="alert alert-success" role="alert">
            <?php echo $add_message; ?>
        </div>
    <?php endif; ?>
    
</form>
</main>

<?php include "../templates/footer.php"; ?>

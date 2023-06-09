<?php include "../templates/header.php"; ?>
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/footer.css">
    <title>Suppliers</title>
</head>
<body>
    <header>
        <?php include "../templates/navbar.php"; ?>
    </header>
    <main>
    <h2>Suppliers List</h2>
<?php
require "../../config.php";

// Construct the SQL query to fetch the data from the table
$sql = "SELECT supplier_id, name, customer_id, warehouse_id, vehicle_id, prod_id, prod_description, prod_quantity FROM suppliers";

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if there are any records in the table
if (mysqli_num_rows($result) > 0) {
    // Output the data in a table format
    echo "<table class='table' border='1' style='border-collapse:collapse'>";
    echo "<tr><th>Supplier ID</th><th>Name</th><th>Customer ID</th><th>Warehouse ID</th><th>Vehicle ID</th><th>Product ID</th><th>Product Description</th><th>Product Quantity</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["supplier_id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["customer_id"] . "</td>";
        echo "<td>" . $row["warehouse_id"] . "</td>";
        echo "<td>" . $row["vehicle_id"] . "</td>";
        echo "<td>" . $row["prod_id"] . "</td>";
        echo "<td>" . $row["prod_description"] . "</td>";
        echo "<td>" . $row["prod_quantity"] . "</td>";
        echo "<td><a href='?delete=" . $row["supplier_id"] . "' class='Btn'>Delete</a></td>";
        echo "</tr>";
    }
    echo "</table>";

} else {
    echo "No records found<br>";
}
echo "<br><a href='add_supplier.php' class='Btn'>Add Supplier</a>";

// Check if a record has been deleted
if (isset($_GET['delete']) && !empty($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    // Delete the record from the database
    $sql_delete = "DELETE FROM suppliers WHERE supplier_id = '$delete_id'";

    if ($conn->query($sql_delete) === TRUE) {
        header("Location: manage_suppliers.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Close the database connection
mysqli_close($conn);
?>
</main>

<?php include "../templates/footer.php"; ?>








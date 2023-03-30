<?php include "../templates/header.php"; ?>
<?php include "../templates/navbar.php"; ?>


    <h2>Warehouses List</h2>

    <?php
    require "../../config.php";

    // Construct the SQL query to fetch the data from the table
    $sql = "SELECT warehouse_id, address, area_sqr_feet FROM warehouse";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Check if there are any records in the table
    if (mysqli_num_rows($result) > 0) {
        // Output the data in a table format
        echo "<table class='table'>";
        echo "<tr><th>Warehouse ID</th><th>Address</th><th>Area (in Square Feet)</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["warehouse_id"] . "</td>";
            echo "<td>" . $row["address"] . "</td>";
            echo "<td>" . $row["area_sqr_feet"] . "</td>";
            echo "<td><a href='?delete=".$row["warehouse_id"]."' class='btn btn-danger'>Delete</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        
    } else {
        echo "No records found<br>";
    }
    echo "<br><a href='add_warehouse.php' class='btn btn-primary'>Add warehouse</a>";

    // Check if a record has been deleted
    if (isset($_GET['delete']) && !empty($_GET['delete'])) {
        $delete_id = $_GET['delete'];
        // Delete the record from the database
        $sql_delete = "DELETE FROM warehouse WHERE warehouse_id = '$delete_id'";
        
        if ($conn->query($sql_delete) === TRUE) {
            header("Location: manage_warehouses.php");
        } else {
        echo "Error deleting record: " . $conn->error;
        }
    }

    // Close the database connection
    mysqli_close($conn);
    ?>

<?php include "../templates/footer.php"; ?>
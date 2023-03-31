<?php include "../templates/header.php"; ?>
<?php include "../templates/navbar.php"; ?>


    <h2>Vehicles List</h2>

    <?php
    require "../../config.php";

    // Construct the SQL query to fetch the data from the table
    $sql = "SELECT vehicle_id, driver_id, company, shipment_weight_pds FROM vehicle";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Check if there are any records in the table
    if (mysqli_num_rows($result) > 0) {
        // Output the data in a table format
        echo "<table class='table'>";
        echo "<tr><th>Vehicle ID</th><th>Driver ID</th><th>Company</th><th>Shipment Weight (in Pounds)</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["vehicle_id"] . "</td>";
            echo "<td>" . $row["driver_id"] . "</td>";
            echo "<td>" . $row["company"] . "</td>";
            echo "<td>" . $row["shipment_weight_pds"] . "</td>";
            echo "<td><a href='?delete=".$row["vehicle_id"]."' class='btn btn-danger'>Delete</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        
    } else {
        echo "No records found<br>";
    }
    echo "<br><a href='add_vehicle.php' class='btn btn-primary'>Add vehicle</a>";

    // Check if a record has been deleted
    if (isset($_GET['delete']) && !empty($_GET['delete'])) {
        $delete_id = $_GET['delete'];
        // Delete the record from the database
        $sql_delete = "DELETE FROM vehicle WHERE vehicle_id = '$delete_id'";
        
        if ($conn->query($sql_delete) === TRUE) {
            header("Location: manage_vehicles.php");
        } else {
        echo "Error deleting record: " . $conn->error;
        }
    }

    // Close the database connection
    mysqli_close($conn);
    ?>

<?php include "../templates/footer.php"; ?>
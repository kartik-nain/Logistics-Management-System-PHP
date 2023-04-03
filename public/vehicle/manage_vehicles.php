<?php include "../templates/header.php"; ?>
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/footer.css">
    <title>Vehicles</title>
</head>
<body>
    <header>
        <?php include "../templates/navbar.php"; ?>
    </header>
    <main>
    <h2>Vehicles List</h2>

    <?php
    require "../../config.php";

    // Construct the SQL query to fetch the data from the table
    $sql = "SELECT vehicle_id, driver_id, company, shipment_weight_pds FROM vehicles";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Check if there are any records in the table
    if (mysqli_num_rows($result) > 0) {
        // Output the data in a table format
        echo "<table class='table' border='1' style='border-collapse:collapse'>";
        echo "<tr><th>Vehicle ID</th><th>Driver ID</th><th>Company</th><th>Shipment Weight (in Pounds)</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["vehicle_id"] . "</td>";
            echo "<td>" . $row["driver_id"] . "</td>";
            echo "<td>" . $row["company"] . "</td>";
            echo "<td>" . $row["shipment_weight_pds"] . "</td>";
            echo "<td><a href='?delete=".$row["vehicle_id"]."' class='Btn'>Delete</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        
    } else {
        echo "No records found<br>";
    }
    echo "<br><a href='add_vehicle.php' class='Btn'>Add vehicle</a>";

    // Check if a record has been deleted
    if (isset($_GET['delete']) && !empty($_GET['delete'])) {
        $delete_id = $_GET['delete'];
        // Delete the record from the database
        $sql_delete = "DELETE FROM vehicles WHERE vehicle_id = '$delete_id'";
        
        if ($conn->query($sql_delete) === TRUE) {
            header("Location: manage_vehicles.php");
        } else {
        echo "Error deleting record: Please delete it from suppliers' list first.";
        }
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
</main>

<?php include "../templates/footer.php"; ?>

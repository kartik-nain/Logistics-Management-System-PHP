<?php include "../templates/header.php"; ?>
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/footer.css">
    <title>Drivers</title>
</head>
<body>
    <header>
        <?php include "../templates/navbar.php"; ?>
    </header>
    <main>
    <h2>Drivers List</h2>

    <?php
    require "../../config.php";

    // Construct the SQL query to fetch the data from the table
    $sql = "SELECT driver_id, name, address, email, phone FROM drivers";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Check if there are any records in the table
    if (mysqli_num_rows($result) > 0) {
        // Output the data in a table format
        echo "<table class='table' border='1' style='border-collapse:collapse'>";
        echo "<tr><th>Driver ID</th><th>Name</th><th>Address</th><th>Email</th><th>Phone No.</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["driver_id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["address"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["phone"] . "</td>";
            echo "<td><a href='?delete=".$row["driver_id"]."' class='Btn'>Delete</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        
    } else {
        echo "No records found<br>";
    }
    echo "<br><a href='add_driver.php' class='Btn'>Add Driver</a>";

    // Check if a record has been deleted
    if (isset($_GET['delete']) && !empty($_GET['delete'])) {
        $delete_id = $_GET['delete'];
        // Delete the record from the database
        $sql_delete = "DELETE FROM drivers WHERE driver_id = '$delete_id'";
        
        if ($conn->query($sql_delete) === TRUE) {
            header("Location: manage_drivers.php");
        } else {
            echo "Error deleting record: Please delete it from suppliers' list first.";
        }
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
    </main>

<?php include "../templates/footer.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/footer.css">
    <title>Customers</title>
</head>
<body>
    <header>
        <?php include "../templates/navbar.php"; ?>
    </header>
    <main>
    <h2>Customers List</h2>

    <?php
    require "../../config.php";

    // Construct the SQL query to fetch the data from the table
    $sql = "SELECT customer_id, name, address, email, phone FROM customer";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Check if there are any records in the table
    if (mysqli_num_rows($result) > 0) {
        // Output the data in a table format
        echo "<table class='table' border='1' style='border-collapse:collapse'>";
        echo "<tr><th>Customer ID</th><th>Name</th><th>Address</th><th>Email</th><th>Phone No.</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["customer_id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["address"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["phone"] . "</td>";
            echo "<td><a href='?delete=".$row["customer_id"]."' class='Btn'>Delete</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        
    } else {
        echo "No records found<br>";
    }
    echo "<br><a href='add_customer.php' class='Btn'>Add customer</a>";

    // Check if a record has been deleted
    if (isset($_GET['delete']) && !empty($_GET['delete'])) {
        $delete_id = $_GET['delete'];
        // Delete the record from the database
        $sql_delete = "DELETE FROM customer WHERE customer_id = '$delete_id'";
        
        if ($conn->query($sql_delete) === TRUE) {
            header("Location: manage_customers.php");
        } else {
        echo "Error deleting record: " . $conn->error;
        }
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
    </main>
    <footer>
        <?php include "../templates/footer.php"; ?>
    </footer>
</body>
</html>
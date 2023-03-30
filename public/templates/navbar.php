<?php
session_start();
?>

<nav class="navbar navbar-expand-md navbar-light bg-light mb-3 p-1" >
	<a class="navbar-brand m-1">Welcome <?php echo $_SESSION["user_name"]; ?> </a>
	<div class="collapse navbar-collapse">
		<ul class="navbar-nav">
			<li class="nav-item"><a class="nav-link" href="/Logistics-Management-System-PHP/public/home_page.php">Home</a></li>
			<li class="nav-item"><a class="nav-link" href="/Logistics-Management-System-PHP/public/supplier/manage_suppliers.php">Suppliers</a></li>
            <li class="nav-item"><a class="nav-link" href="/Logistics-Management-System-PHP/public/driver/manage_drivers.php">Drivers</a></li>
			<li class="nav-item"><a class="nav-link" href="/Logistics-Management-System-PHP/public/vehicle/manage_vehicles.php">Vehicles</a></li>
			<li class="nav-item"><a class="nav-link" href="/Logistics-Management-System-PHP/public/customer/manage_customers.php">Customers</a></li>
			<li class="nav-item"><a class="nav-link" href="/Logistics-Management-System-PHP/public/warehouse/manage_warehouses.php">Warehouses</a></li>
		</ul>
	</div>
	<ul class="navbar-nav">
		<li class="nav-item"><a class="nav-link" href="../index.php">Logout</a></li>
	</ul>	
</nav>
<div class="container">
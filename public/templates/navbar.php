<?php
session_start();
?>

<nav class="navbar navbar-expand-md navbar-light bg-light mb-3 p-1" >
	<a class="navbar-brand m-1">Welcome <?php echo $_SESSION["user_name"]; ?> </a>
	<div class="collapse navbar-collapse">
		<ul class="navbar-nav">
			<li class="nav-item"><a class="nav-link" href="home_page.php">Home</a></li>
			<li class="nav-item"><a class="nav-link" href="manage_suppliers.php">Suppliers</a></li>
            <li class="nav-item"><a class="nav-link" href="manage_drivers.php">Drivers</a></li>
		</ul>
	</div>
	<ul class="navbar-nav">
		<li class="nav-item"><a class="nav-link" href="../index.php">Logout</a></li>
	</ul>	
</nav>
<div class="container">
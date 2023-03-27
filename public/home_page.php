<?php
session_start();
?>

<?php include "templates/header.php"; ?>

<h2> Welcome
            <?php echo $_SESSION["user_name"]; ?> !
        </h2>
<ul>
	<li><a href="supplier.php"><strong>See</strong></a> all suppliers</li>
</ul>


<?php include "templates/footer.php"; ?>
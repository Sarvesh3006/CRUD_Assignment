<?php include('dbcon.php'); ?>


<?php 

if(isset($_GET['id'])){

	$id = $_GET['id'];



$query = "DELETE from `customers` WHERE `id` = '$id' ";

$result = mysqli_query($connection, $query);

if(!$result){
	die("Query Failed" . mysql_error());
}
else{
	header('location:index.php?delete_msg=You have Deleted this Record');
}

}


 ?>
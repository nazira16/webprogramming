<?php
include_once 'database.php';
session_start();

	$sid = $_SESSION['fld_staff_id'];
	
	$stmt = $conn->prepare("SELECT * FROM tbl_staffs_a168219 WHERE fld_staff_id = '$sid'");

	$stmt->execute();
	
	$readrow = $stmt->fetch(PDO::FETCH_ASSOC);
	
$name = $readrow['fld_staff_fname'];
$pos = $readrow['fld_staff_level'];
$pass = $readrow['fld_staff_password'];

		
if($sid==''){
	header("location:index.php?login");
	}
	else {
	header("");
	}
?>
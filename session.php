<?php
include_once 'db.php';
session_start();

	$sid = $_SESSION['FLD_STAFF_ID'];
	
	$stmt = $conn->prepare("SELECT * FROM tbl_staff_a171782_pt2 WHERE FLD_STAFF_ID = '$sid'");

	$stmt->execute();
	
	$readrow = $stmt->fetch(PDO::FETCH_ASSOC);
	
$name = $readrow['FLD_STAFF_NAME'];
$pos = $readrow['FLD_POSITION'];

		
if($sid==''){
	header("location:index.php?login");
	}
	else {
	header("");
	}
?>
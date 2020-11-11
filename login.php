<?php 
include_once 'db.php';
	
		$stmt = $conn->prepare("SELECT * FROM tbl_staff_a171782_pt2 WHERE FLD_STAFF_ID = :sid AND FLD_STAFF_PASSWORD = :pass AND FLD_POSITION = :pos");
		
		$stmt->bindParam(':sid', $sid, PDO::PARAM_STR);
		$stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
		$stmt->bindParam(':pos', $pos, PDO::PARAM_STR);

		$sid=$_POST['sid'];
		$pass=$_POST['pass'];
		$pos=$_POST['pos'];
	

		$stmt->execute();
		$result = $stmt->fetchAll();
		$bil_row = $stmt->rowCount();
		
			if($bil_row > 0)
			{
				session_start();
				
				$_SESSION['FLD_STAFF_ID']=$sid;

				if ($_POST["pos"]=== "Supervisor") {
					# code...
					header("location:mainpage.php");
				}
				else {
					# code...
					header("location:mainpagenormal.php");
				}
					
				
			}
			else
			{
				header("location:index.php?login=failed");
			}	
?>
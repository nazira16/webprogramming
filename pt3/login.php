<?php 
include_once 'database.php';
  
    $stmt = $conn->prepare("SELECT * FROM tbl_staffs_a168219 WHERE fld_staff_id = :sid AND fld_staff_password = :pass");
    
    $stmt->bindParam(':sid', $sid, PDO::PARAM_STR);
    $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
  

    $sid=$_POST['sid'];
    $pass=$_POST['pass'];

  

    $stmt->execute();
    $result = $stmt->fetchAll();
    $bil_row = $stmt->rowCount();
    
      if($bil_row > 0)
      {
        session_start();
        
        $_SESSION['fld_staff_id']=$sid;
          # code...
          header("location:mainpage.php");
      
        
      }
      else
      {
        header("location:index.php?login=failed");
      } 
?>
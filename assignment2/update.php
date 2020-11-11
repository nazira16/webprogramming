<?php

if (isset($_POST['edit_form'])) {

  include "db.php";

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("UPDATE assignment2 SET user = :name, email = :email, findme = :findme, frontpage = :frontpage, form = :form, ui = :ui, comment = :comment WHERE id = :record_id");

    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':findme', $findme, PDO::PARAM_STR);
    $stmt->bindParam(':frontpage', $frontpage, PDO::PARAM_STR);
    $stmt->bindParam(':form', $form, PDO::PARAM_STR);
    $stmt->bindParam(':ui', $ui, PDO::PARAM_STR);
    $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
    $stmt->bindParam(':record_id', $id, PDO::PARAM_INT);

    $name = $_POST['name'];
    $email = $_POST['email'];
    $findme = $_POST['findme'];
  if (isset($_POST['frontpage'])) {
      $_POST['frontpage'] = "yes";
    }
    else {
      $_POST['frontpage']="no";
    }
    if (isset($_POST['form'])){
      $_POST['form'] = "yes";
    }
    else{
      $_POST['form'] = "no";
    }
    if (isset($_POST['ui'])){
      $_POST['ui'] = "yes";
    }
    else{
      $_POST['ui'] = "no";
    }
    $frontpage = $_POST['frontpage'];
    $form = $_POST['form'];
    $ui = $_POST['ui'];
    $comment = $_POST['comment'];
    $id = $_POST['id'];

    $stmt->execute();

    header("Location:list.php");
  }

  catch(PDOException $e)
  {
    echo "Error: " . $e->getMessage();
  }

  $conn = null;
}
else {
  echo "Error: You have execute a wrong PHP. Please contact the web administrator.";
  die();
}

?>
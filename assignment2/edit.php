<?php
 
if (isset($_GET['id'])) {
 
  include "db.php";
 
  try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
      $stmt = $conn->prepare("SELECT * FROM assignment2 WHERE id = :record_id");
      $stmt->bindParam(':record_id', $id, PDO::PARAM_INT);
      $id = $_GET['id'];
 
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
 
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
 
<!DOCTYPE html>
<html>
<head>
  <title>My Guestbook</title>
</head>
 
<body>
 <font face="Century Gothic">
<form method="post" action="update.php">
  Nama :
  <input type="text" name="name" size="40" required value="<?php echo $result["user"]; ?>">
  <br><br>
  Email :
  <input type="text" name="email" size="41" required value="<?php echo $result["email"]; ?>">
  <br><br>
  How did you find me?
  <select name="findme" value="<?php echo $result["findme"].select; ?>">
    <option>From a friend</option>
    <option>I googled you</option>
    <option>Just surf on in</option>
    <option>From your Facebook</option>
    <option>I clicked an ads</option>
  </select>
  <br><br>
  I like your: <br>
  <input type="checkbox" name="frontpage" value="yes">Front page<br>
  <input type="checkbox" name="form" value="yes">Form<br>
  <input type="checkbox" name="ui" value="yes">User Interface
  <br><br>
  Comments :<br>
  <textarea name="comment" cols="50" rows="8" required><?php echo $result["comment"]; ?></textarea>
  <br>
  <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
  <input type="submit" name="edit_form" value="Modify Comment">
  <input type="reset">
  <br>
</form>
 
</body>
</html>
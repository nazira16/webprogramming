<!DOCTYPE html>
<html>
<head>
  <title>My Guestbook</title>
</head>
 
<body>
 <font face="Century Gothic">
<form method="post" action="insert.php">
  Nama :
  <input type="text" name="name" size="40" required>
  <br><br>
   Email :
  <input type="text" name="email" size="41" required>
  <br><br>
  How did you find me?
  <select name="findme">
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
  <input type="checkbox" name="interface" value="yes">User Interface
  <br><br>
  Comments :<br>
  <textarea name="comment" cols="50" rows="8" required></textarea>
  <br>
  <input type="submit" name="add_form" value="Add a New Comment">
  <input type="reset">
  <br>
</font>
</form>
 
</body>
</html>
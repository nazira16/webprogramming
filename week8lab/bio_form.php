<?php
 
$univ = array
  (
  array("name"=>"Universiti Putra Malaysia","abb"=>"UPM"),
  array("name"=>"Universiti Kebangsaan Malaysia","abb"=>"UKM"),
  array("name"=>"Universiti Malaya","abb"=>"UM"),
  array("name"=>"Universiti Sains Malaysia","abb"=>"USM"),
  array("name"=>"Universiti Teknologi Malaysia","abb"=>"UTM")
  );
 
 ?>
 
<!DOCTYPE html>
<html>
<head>
  <title>Biodata</title>
 <style type="text/css">
 
    input {
        width: 100%;
        padding: 12px 20px;
        margin: 10px 0px 10px 0px;
        box-sizing: border-box;
        font: 100% Lucida Sans, Verdana;

    }

    body {
    font: 100% Lucida Sans, Verdana;
    margin: 20px;
    line-height: 26px;
    }

    label {
      font-weight: bold;
    }

</style>
</head>

<body>
<h1>Biodata Form</h1>
<hr>
<form action="validate_biodata.php" method="post">
     
<label for="idname">Name:</label>
<input type="text" name="name" id="idname" placeholder="Insert your name" autofocus><br>
     
<label for="idage">Age:</label>
<input type="number" name="age" id="idage" min="0" max="100" step="1"><br>
     
<label for="idsex">Sex:</label><br>
<input type="radio" name="sex" id="idsex" value="male" style=" width:35px; vertical-align: middle;">Male<br>
<input type="radio" name="sex" id="idsex" value="female" style=" width:35px; vertical-align: middle;">Female<br>
       
<style type="text/css">
  textarea{
    width: 100%;
    box-sizing: border-box;
    font: 100% Lucida Sans, Verdana;
    padding: 12px 20px;
    margin: 10px 0px 10px 0px;
  }
</style>
<label for="idaddress">Address:</label>
<textarea name="address" id="idaddress" cols="50" rows="5" placeholder="Insert your address" style="vertical-align: top;"></textarea><br>
     
<label for="idemail">Email:</label>
<input type="email" id="idemail" name="email" placeholder="Insert your email"><br>
     
<label for="iddob">Date of Birth:</label>
<input type="date" id="iddob" name="dob"><br>
     
<label for="idheight">Height:</label><br>
<input type="range" name="height" id="heightId" min = "100" max = "200" oninput="outputId.value = heightId.value" style="width: 30%">
<output id="outputId">150</output>cm<br>
     
<label for="idtel">Tel:</label>
<input type="tel" name="phone" id="idtel" pattern="\+60\d{2}-\d{7}" placeholder="+60##-#######"><br>
     
<label for="idcolor">My Favorite Color:</label><br>
<input type="color" name="color" id="idcolor" style="width: 30%"><br>
     
<label for="idfbtwig">Fb/TW/IG:</label>
<input type="url" name="fbtwig" id="idfbtwig" placeholder="Insert the URL"><br>
     
<style type="text/css">
  select{
      width: 100%;
      padding: 12px 20px;
      margin: 10px 0px 10px 0px;
      box-sizing: border-box;
      font: 100% Lucida Sans, Verdana;      
    }
</style>
<label for="iduniv"></label>My University:
<select name="university" id="iduniv">
  <option value="" selected>Select</option>
  <?php
  foreach ($univ as $u) {
    echo "<option value=".$u['abb'].">".$u['name']."</option>";
  }
  ?>
</select><br>
 
 <style type="text/css">
   input[type="submit"], input[type="reset"]{
    background-color: blue;
    border: none;
    color: white;
    padding: 16px 32px;
    margin: 4px 2px 10px 0px;
    text-decoration: none;
    cursor: pointer;

   }

   }
 </style>

<input type="hidden" name="matricnum" value="a123456">
<input type="submit" name="biodata_form" value="Submit My Biodata">
<input type="reset">
</form>
 
</body>
</html>
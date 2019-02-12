<!DOCTYPE HTML>
<html>
<link rel="stylesheet" href="./style.css">
<link href="https://fonts.googleapis.com/css?family=Cinzel" rel="stylesheet">

<center><h2>Add a publication</h2></center>
<center>
<div class="container" style="float:center;">
<form method="post">
<label>Title: </label><input type="text" name = "title" placeholder="Title"><br>
<label>Year: </label><input type="text" name = "year" placeholder="Year"><br>
<label>Location: </label><input type="text" name = "location" placeholder="Location"><br>
<label>Type: </label><input type="text" name = "type" placeholder="Type"><br>
<label>Author's First Name: </label><input type="text" name = "auth_fname" placeholder="Author's First Name"><br>
<label>Author's Last Name: </label><input type="text" name = "auth_lname" placeholder="Author's Last Name"><br>
</div>
</center>
<center><input type="submit" name = "Submit" value="Add" id="submitbutton">

<input type="submit" name = "Back" value="Back" id="backbutton"></center>
</form>

<?php
include("dbconnection.php");
if(isset($_POST['Submit'])){ //check if form was submitted
    $title=$_POST["title"];
    $year=$_POST["year"];
    $location=$_POST["location"];
    $type=$_POST["type"];
    $auth_fname=$_POST["auth_fname"];
    $auth_lname=$_POST["auth_lname"];

    $query = "insert into `publication`(title, year, location, type, auth_fname, auth_lname) values('$title',$year,'$location','$type','$auth_fname','$auth_lname');";
    $result = mysqli_query($dbconn,$query);
}
if(isset($_POST['Back'])) {

    header("Location: index.php");
    exit;
}
?>

</body>
</html>

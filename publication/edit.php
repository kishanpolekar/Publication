<!DOCTYPE HTML>
<html>

<link rel="stylesheet" href="./style.css">
<link href="https://fonts.googleapis.com/css?family=Cinzel" rel="stylesheet">

<center><h2>Edit a publication</h2></center>

<center>
<div class="container" style="float:center;">
<form method="get">
<label>Title: </label><input type="text" name = "title" placeholder="Title"><br>
<label>Author's Last Name: </label><input type="text" name = "auth_lname" placeholder="Author's Last Name"><br>
</div>
</center>

<center><input type="submit" name = "Submit" value="Search" id="submitbutton">

<input type="submit" name = "Back" value="Back" id="backbutton"></center>
</form>

<?php
include("dbconnection.php");
if(isset($_GET['Submit'])){ //check if form was submitted
    $title=$_GET["title"];
    $auth_lname=$_GET["auth_lname"];

    $query = "select title,year,location,type,auth_fname,auth_lname from publication where title like '$title' or auth_lname like '$auth_lname'";
    $result = mysqli_query($dbconn,$query);

    if ($data=$result->fetch_array()) {

        $title=$data["title"];
        $year=$data["year"];
        $location=$data["location"];
        $type=$data["type"];
        $auth_fname=$data["auth_fname"];
        $auth_lname=$data["auth_lname"];

        if(isset($_POST['Submit'])){
            $title2=$_POST["title2"];
            $year2=$_POST["year2"];
            $location2=$_POST["location2"];
            $type2=$_POST["type2"];
            $auth_fname2=$_POST["auth_fname2"];
            $auth_lname2=$_POST["auth_lname2"];
            $query = "update `publication` set title = '$title2', year = $year2, location = '$location2',type = '$type2', auth_fname = '$auth_fname2', auth_lname = '$auth_lname2' where title like '%$title%' and auth_lname like '%$auth_lname%';";
            $result = mysqli_query($dbconn,$query);
            echo "<h2><center>Publication edited!</center></h2>" ;
        }

        else {?>
        <center>
        <div class="container" style="float:center;">
    <form method="post">
        <label>Title: </label><input type="text" name = "title2" placeholder="Title" value="<?php echo htmlspecialchars($title); ?>"> <br>
        <label>Year: </label><input type="text" name = "year2" placeholder="Year" value="<?php echo htmlspecialchars($year); ?>"> <br>
        <label>Location: </label><input type="text" name = "location2" placeholder="Location" value="<?php echo htmlspecialchars($location); ?>"><br>
        <label>Type: </label><input type="text" name = "type2" placeholder="Type" value="<?php echo htmlspecialchars($type); ?>"><br>
        <label>Author's First Name: </label><input type="text" name = "auth_fname2" placeholder="Author's First Name" value="<?php echo htmlspecialchars($auth_fname); ?>"><br>
        <label>Author's Last Name: </label><input type="text" name = "auth_lname2" placeholder="Author's Last Name" value="<?php echo htmlspecialchars($auth_lname); ?>"><br>
        </div>
    </center>
        <center><input type="submit" name = "Submit" value="Edit" id="submitbutton"></center>
    </form>
<?php
    }
}
    else {echo "<h2><center>No publications found in the database!</center></h2>" ;}
}

if(isset($_GET['Back'])) {

    header("Location: index.php");
    exit;
}
?>

</body>
</html>

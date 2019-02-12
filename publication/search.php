<!DOCTYPE HTML>
<html>

<link rel="stylesheet" href="./style.css">
<link href="https://fonts.googleapis.com/css?family=Cinzel" rel="stylesheet">

<style>
table {

    font-family: 'Cinzel';
    font-style: normal;
    font-weight: 100;
    border-collapse: collapse;
    width: 70%;
    text-align: center;
}

th, td {

    padding: 10px;
}

tr:nth-child(even){background-color: #2a2a2a; color: white;}
tr:nth-child(odd){background-color: azure; color: #2a2a2a;}

th {
    background-color: #4CAF50;
    color: white;
}
</style>

<center><h2>Search a publication</h2></center>

<center>
<div class="container" style="float:center;">
<form method="post">
<label>Title: </label><input type="text" name = "title" placeholder="Title"><br>
<label>Author's Last Name: </label><input type="text" name = "auth_lname" placeholder="Author's Last Name"><br>
</div>
</center>

<center><input type="submit" name = "Submit" value="Search" id="submitbutton">

<input type="submit" name = "Back" value="Back" id="backbutton">

<input type="submit" name = "All" value="Display all Publications" id="backbutton"></center>
</form>

<?php
include("dbconnection.php");
if(isset($_POST['Submit'])){ //check if form was submitted

    $title=$_POST["title"];
    $auth_lname=$_POST["auth_lname"];

    $query = "select title,year,location,type,auth_fname,auth_lname from publication where title like '$title' or auth_lname like '$auth_lname'";
    $result = mysqli_query($dbconn,$query);

    if(mysqli_num_rows($result)>0){

        echo "<h2><center>Found ".mysqli_num_rows($result)." publications: </center></h2>";
        ?>

        <table align="center">

        <tr>
        <th> Title </th>
        <th> Year </th>
        <th> Location </th>
        <th> Type </th>
        <th> Author's First Name </th>
        <th> Author's Last Name </th>
        </tr>

        <?php
        while ($data=$result->fetch_array()) {
        ?>
            <tr>
            <td><?php echo $data["title"];?> </td>
            <td><?php echo $data["year"];?> </td>
            <td><?php echo $data["location"];?> </td>
            <td><?php echo $data["type"];?> </td>
            <td><?php echo $data["auth_fname"];?> </td>
            <td><?php echo $data["auth_lname"];?> </td>
            </tr>

        <?php
        }
    }
    else {echo "<h2><center>No publications found in the database!</center></h2>" ;}
}

if(isset($_POST['Back'])) {

    header("Location: index.php");
    exit;
}

if(isset($_POST['All'])) {

    header("Location: displayall.php");
    exit;
}
?>
</table>
</body>
</html>

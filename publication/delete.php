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

<center><h2>Delete a publication</h2></center>

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
        <th> Delete </th>
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
            <td><form method="post"><input type="submit" name="del" value="Delete" id="buttondelete"></form>
            </td>
            </tr>

            <?php

            if(isset($_POST['del'])) {

                $deltitle = $data['title'];
                $delauth = $data['auth_lname'];
                $query = "delete from publication where title like '$deltitle' and auth_lname like '$delauth'";
                $result = mysqli_query($dbconn,$query);
                header("Location: displayall.php");
            }
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

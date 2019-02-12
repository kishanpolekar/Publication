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

<center><h2>List of Publications</h2></center>
<?php
include("dbconnection.php");

$query = "select title,year,location,type,auth_fname,auth_lname from publication";
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
?>
</table>

<form method="post">
<center><input type="submit" name = "OK" value="OK" id="backbutton"></center>
</form>

<?php

if(isset($_POST['OK'])) {

    header("Location: index.php");
    exit;
}

?>
</body>
</html>

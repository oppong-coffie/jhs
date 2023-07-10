<?php
 if(isset($_GET["id"]))
//database connection
$connection = mysqli_connect('localhost', 'root', '', 'management_class');

//update the daily report table
if(isset($_POST['updatedaily'])){
    //get the variables from the form
    $score=$_POST['score'];
    //sql statement to update
    $sql="UPDATE dailyrecord SET mark = 777 WHERE std_id = 'bcict1'";
    $query=mysqli_query($connection, $sql);
}
?>
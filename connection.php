<?php
//mysqli_connect("localhost", "root", "","first");
//mysql_select_db('first');

$username= "root";
$password= "";
$server='localhost';
$db='first';

$con = mysqli_connect($server,$username,$password,$db);

if($con) {
    //echo "Connection Successful";
    ?>
    <!--<script>
    alert('Connection Successful');
    </script>-->
    <?php
}else{
    //echo "No connection"
    die("No Connection" .mysqli_connect_error());
}

?>

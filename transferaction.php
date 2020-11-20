<?php
        include 'connection.php';

$sender_id = 12345;
$receiver_id = 12348;
$amount = 200;
$query=mysqli_query($con,"select * from customers where id='$sender_id' ");
$sender=mysqli_fetch_array($query);
$query=mysqli_query($con,"select * from customers where id='$receiver_id' ");
$receiver=mysqli_fetch_array($query);
if($amount > $sender['Balance']) {
    echo 'insufficient funds';
}
else {
    $balance = $sender['Balance'] - $amount;
    $balance_receiver = $receiver['Balance'] + $amount;
    $query=mysqli_query($con,"UPDATE `customers` SET `Balance`= $balance WHERE id=$sender_id ");
    $query=mysqli_query($con,"UPDATE `customers` SET `Balance`= $balance_receiver WHERE id=$receiver_id ");


    
}
echo $sender['Balance'] ;
echo  $receiver['Balance'];
echo $balance;




?>


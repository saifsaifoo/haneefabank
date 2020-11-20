<!DOCTYPE html>
<html>
<head>
    <title>Transfer</title>

    <link rel="icon" type="image/png" href="https://www.google.com/s2/favicons?domain=onlinesbi.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="transfermain.css">

</head>
<body>
<div class="filter">

</div>
<div class="container">
        <div class="navbar">
        <div id="welcome">
        <?php 
        include 'connection.php';
        $id = $_GET['id'];
        $query=mysqli_query($con,"select * from customers where id='$id' ");
        while($row=mysqli_fetch_array($query))
        {
        
            echo 'Welcome, ' ,$row['Name'];
            
  
        }
        ?>
        </div>
            <nav>
            
                <ul>
                  
                   
                    <li> <a href="aboutus.html"><b> ABOUT US</b></a></li>
                    <li> <a href="table.php"><b>VIEW ALL CUSTOMERS</b></a></li>
                    <li> <a href="index.html"><b>HOME</b></a></li>
                    
                    
                </ul>
            </nav>
           
        </div>



</div>
<div class="login-box">
  <h2>Transfer</h2>
  <form method="post">
    <div class="user-box">
      
      <?php 
        include 'connection.php';
        $rid = $_GET['rid'];
        $query=mysqli_query($con,"select * from customers where id='$rid' ");
        while($rec=mysqli_fetch_array($query))
        {
        ?>
        
        <h3><?php echo 'To: ' ,$rec['Name']; ?> </h3>
        <?php
        }?>
      
    </div>
    <div class="user-box">
  
    <input type="text" id="amount" name="amount" required="">
    <label for="">Amount</label>
    <!--<label>  <textarea name="amount" id="" cols="30" rows="1"></textarea></label>-->
      
    </div>
    <input type="submit" name="transfer"
                class="button" value="CONFIRM">
     
      
    </input>
  </form>
</div>


<?php

        if(array_key_exists('transfer', $_POST)) { 
            transfer(); 
        } 

function transfer() 
{ 
    
    include 'connection.php'; 
    $sender_id = $_GET['id'];
    $receiver_id = $_GET['rid'];
    $amount = $_POST["amount"];

    $query=mysqli_query($con,"select * from customers where id='$sender_id' ");
    $sender=mysqli_fetch_array($query);
    $query=mysqli_query($con,"select * from customers where id='$receiver_id' ");
    $receiver=mysqli_fetch_array($query);
    if($amount > $sender['Balance']) 
    {
        function function_alert($message) { 
      
            // Display the alert box  
            echo "<script>alert('$message');</script>"; 
        } 
          
          
        // Function call 
        function_alert("INSUFFICIENT FUNDS !!!! ");
    }
    else 
    {
    $balance = $sender['Balance'] - $amount;
    $balance_receiver = $receiver['Balance'] + $amount;
    function function_alert($message) { 
      
        // Display the alert box  
        echo "<script>alert('$message');</script>"; 

    } 
     // Function call 
     function_alert("Transfer successful");
      
  
    
    $query=mysqli_query($con,"UPDATE `customers` SET `Balance`= $balance WHERE id=$sender_id ");
    $query=mysqli_query($con,"UPDATE `customers` SET `Balance`= $balance_receiver WHERE id=$receiver_id ");
    include 'newconnection.php';
    $id=$_GET['id'];
    $sender_id = $_GET['id'];
    $receiver_id = $_GET['rid'];
    $sender_name=$sender['Name'];
    $amount = $_POST["amount"];
    $receiver_name=$receiver['Name'];
    $sql3 = mysqli_query($con,"INSERT INTO `transaction` VALUES ('$sender_id', '$receiver_id','$sender_name', '$receiver_name', '$amount' , now() )");
     
    header("Location:history.php?id=$sender_id");

    }

}
?>

</body>
</html>

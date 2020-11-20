<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Yantramanav:wght@300&display=swap" rel="stylesheet">
    <title>Transaction History</title>
    
    <link rel="icon" type="image/png" href="https://www.google.com/s2/favicons?domain=onlinesbi.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <?php include 'historystyle.css'; ?>
    

</head>
<body>
<div class="filter">

</div>
<div class="container">
        <div class="navbar">
            
            <img src="images/ok.png" class="logo">
           
            <nav>
                <ul>
                  
                   
                    <li> <a href="aboutus.html"><b> ABOUT US</b></a></li>
                    <li> <a href="table.php"><b>VIEW ALL CUSTOMERS</b></a></li>
                    <li> <a href="index.html"><b>HOME</b></a></li>
                    
                    
                </ul>
            </nav>
          
        </div>
</div>
<div>

<div id="welcome">
        <?php 
        include 'connection.php';
        $id = $_GET['id'];
        $query=mysqli_query($con,"select * from customers where id='$id' ");
        while($row=mysqli_fetch_array($query))
        {
        
            echo 'Your Balance is  ' ,$row['Balance'];
            
  
        }
        ?>
        </div>
<h1> TRANSACTION HISTORY </h1>
<table id='sender'>
<thead>
 <tr>

 <th>SERIAL NO</th>

 <th> NAME</th>

<th> DEBIT</th>
<th> CREDIT</th>

<th> DATE AND TIME</th>

</tr>
</thead>
<tbody>
        <?php 
        include 'connection.php';
        include 'newconnection.php';
        $id = $_GET['id'];
        $sender_id = $_GET['id'];
        $id = $_GET['id'];
        // $sender_id = $_GET['sender_id'];
        
        $query=mysqli_query($con,"SELECT * FROM `transaction` t where sender_id ='$id' OR receiver_id='$id'" ) or die( mysqli_error($con));
        $sno =1;

        while($transfer=mysqli_fetch_array($query))
        {
        ?> 
        <tr>
        

            <td><?php  echo $sno; $sno++ ?> </td>
            <?php $id = $_GET['id']; ?>
            
            
            <?php if($id==$transfer['sender_id'])
            {
            ?>
                
           <td><?php  echo $transfer['receiver_name']; ?> </td>
           <td><?php  echo '--'; ?></td>
           <td><?php  echo $transfer['amount']; ?> </td>
           <?php
            }
            else  {  ?>
                <td><?php  echo $transfer['sender_name']; ?> 
                <td><?php  echo $transfer['amount']; ?> </td>
                <td><?php  echo '--'; ?></td>
            <?php
            }
            ?>
            <td><?php  echo $transfer['at']; ?> </td>
        </tr>
        <?php
        }
        ?>
        
       
    </tbody>
</table>
</div>
</body>
</html>

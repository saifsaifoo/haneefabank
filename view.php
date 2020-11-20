<!DOCTYPE html>
<html>
<head>
  <title>VIEW CUSTOMER</title>
  <link rel="icon" type="image/png" href="https://www.google.com/s2/favicons?domain=onlinesbi.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <?php include 'tablestyle.css'; ?>

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



  
  <table class="demo">

 
<thead>
 <tr>

 <th>Account Number</th>

 <th>Name</th>

 <th>Balance</th>

<!--<th> Action </th>-->

</tr>
</thead>
<tbody>
<?php 

include 'connection.php';

$id = $_GET['id'];
$query=mysqli_query($con,"select * from customers where id='$id' ");
while($row=mysqli_fetch_array($query))
{
?>
<tr>
    <td><?php echo $row['id'];?></td>
    <td><?php echo $row['Name'];?></td>
    <td><?php echo $row['Balance'];?></td>
</tr>
<?php
}
?>
 
</tbody>
</table>
<div class="filter">
<a href="transfer.php?id=<?php echo $id;?>" class="btn">Tranfer Money</a>

  </div>


</body>
</html> 

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Transfer</title>
    <title>HOME</title>
    <link rel="icon" type="image/png" href="https://www.google.com/s2/favicons?domain=onlinesbi.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <?php include 'transferstyle.css'; ?>
    

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
                    <li> <a href="view.html"><b>HOME</b></a></li>
                    
                    
                </ul>
            </nav>
           
        </div>



</div>
<table class="demo">

 
<thead>
 <tr>

 <th>Account Number</th>

 <th>Name</th>
 <th> Action <th>
 </tr>
</thead>
<tbody>
<?php 

include 'connection.php';

$id = $_GET['id'];

$query=mysqli_query($con,"select * from customers where id!='$id' ");
while($row=mysqli_fetch_array($query))
{ 

?>
    <tr>
        <td><?php echo $row['id'];?></td>
        <td><?php echo $row['Name'];?></td>
        <td><a href="afterclickingtransfer.php?rid=<?php  echo $row['id']; ?>&id=<?php echo $id ?>">Select</a></td>

    </tr>
<?php
}
?>
 
</tbody>
</table>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        <span id="modal-myvalue"></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

</div>    

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    // data-* attributes to scan when populating modal values
var ATTRIBUTES = ['myvalue', 'myvar', 'bb'];

$('[data-toggle="modal"]').on('click', function (e) {
  // convert target (e.g. the button) to jquery object
  var $target = $(e.target);
  // modal targeted by the button
  var modalSelector = $target.data('target');
  
  // iterate over each possible data-* attribute
  ATTRIBUTES.forEach(function (attributeName) {
    // retrieve the dom element corresponding to current attribute
    var $modalAttribute = $(modalSelector + ' #modal-' + attributeName);
    var dataValue = $target.data(attributeName);
    
    // if the attribute value is empty, $target.data() will return undefined.
    // In JS boolean expressions return operands and are not coerced into
    // booleans. That way is dataValue is undefined, the left part of the following
    // Boolean expression evaluate to false and the empty string will be returned
    $modalAttribute.text(dataValue || '');
  });
});
</script>
    
</body>
</html>
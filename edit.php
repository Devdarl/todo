<?php

require_once 'connect.php';
require_once 'header.php';
session_start();
 // Using database connection file here
 if(!isset($_POST['update'])){ // when click on Update button

$id = $_GET['id']; // get id through query string

$sql = "SELECT * FROM activity WHERE id=" . $id; // select query

// fetch data
$result = $con->query($sql);
$row = $result->fetch_assoc();

}
 


if(isset($_POST['update'])) // when click on Update button
{
    $item = $_POST['item'];
    $day = $_POST['day'];
    $status = $_POST['status'];
    $id = $_POST['todoid'];
	
    // $edit = mysqli_query($con,"update tblemp
    //  set fullname='$fullname', age='$age' where id='$id'");
    if( empty($item) || empty($day))
    {
        echo "Please fillout all required fields";
    }

     $sql = "UPDATE activity SET item = '$item',
      day = '$day', status = '$status' WHERE id = '$id' ";

    if( $con->query($sql) === TRUE){
        echo "<div class='alert alert-success'>Successfully added new todo</div>";
        mysqli_close($con); // Close connection
        header("location:index.php"); // redirects to all records page
        $_SESSION['success'] = 'Sucessfully updated';
        exit;
    
    }else{
        echo "<div class='alert alert-danger'>Error: There was an error while adding new todo</div>";
        echo mysqli_error($con);
    }

	
    
}
?>

<h3>Update Data</h3>

<form method="POST" action="edit.php">
<div class="col-md-6 col-md-offset-3">
<div class="container">
 <?php echo "<input type='hidden' value='". $row['id']."' name='todoid' />"; //added ?>
<div class="form-group">
    <label for="">Item</label>
    <input type="text" class="form-control" name="item" value="<?php echo $row['item'] ?>" placeholder="Enter Item" Required>    
</div>

    <div class="form-group">
    <label for="">Day</label>
     <input type="date" class="form-control" name="day" value="<?php echo $row['day'] ?>" required placeholder="Enter Age">
    </div>

    <div class="form-group">
    <label for="">Change Status</label>
     
    <select name="status" id="" class="form-control">
        <option value="0">Not Done</option>
        <option value="1">Done</option>
        </select>
        </div>  
    
    <input class="btn btn-primary" type="submit" name="update" value="Update">

</div>
</div>
</div>
</form>
<?php
require_once 'footer.php';
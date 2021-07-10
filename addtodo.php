<?php
require_once 'connect.php';
require_once 'header.php';
?>
<div class="container">
<?php
if(isset($_POST['addnew'])){
        $item = $_POST['item'];
        $day = $_POST['day'];
        $status = $_POST['status'];
    
        if( empty($item) || empty($day))
    {
        echo "Please fillout all required fields";
    }
    else{
        $sql = "INSERT INTO activity(item,day,status)
        VALUES('$item','$day','$status')";

        if( $con->query($sql) === TRUE){
            echo "<div class='alert alert-success'>Successfully added new todo</div>";
        }else{
            echo "<div class='alert alert-danger'>Error: There was an error while adding new todo</div>";
        }
    }
}
?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="box">
        <h3><i class="glyphicon glyphicon-plus"></i>&nbsp;Add New Todo</h3>
        
        <form action="addtodo.php" method="POST">
        <label for="item">item</label>
        <input type="text" id="item" name="item" class="form-control"><br>
       
        <label for="day">day</label>
        <input type="date" name="day" id="day" class="form-control"><br>
        
        <label for="status">status</label>
        
        <select name="status" id="" class="form-control">
        <option value="0">Not Done</option>
        <option value="1">Done</option>
        </select>
        
        <br>
        <input type="submit" name="addnew" class="btn btn-success" value="Add New">
        </form>
    </div>
    <a href="index.php" class="btn btn-primary">View All Todos</a>
    </div>
    </div>
</div>
<?php
require_once 'footer.php';
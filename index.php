<?php

require_once 'connect.php';
require_once 'header.php';


echo "<div class='container'>";


if( isset($_POST['delete'])){
    $sql = "DELETE FROM activity WHERE id=" . $_POST['todoid'];
    if($con->query($sql) === TRUE){
        echo "<div class='alert alert-success'>Successfully delete user</div>";
    }
}


$sql = "SELECT * FROM activity";
$result = $con->query($sql);


if( $result->num_rows > 0)
{
?>
<h2>List of Todos</h2>
<table class="table table-bordered table-striped">
    <tr>
        <td>Item</td>
        <td>Date Due</td>
        <td>Status</td>
        <td width="70px">Delete</td>
        <td width="70px">EDIT</td>
    </tr>
    <?php
    while( $row = $result->fetch_assoc()){
        echo "<form action='index.php' method='POST'>"; //added
        echo "<input type='hidden' value='". $row['id']."' name='todoid' />"; //added
        echo "<tr>";
        echo "<td>".$row['item'] . "</td>";
        echo "<td>".$row['day'] . "</td>";
        "<td>";
          if($row['status'] == false){
                echo "<td> <button class='btn btn-danger'>Not Complete</button>  </td>";
        }else{
            echo "<td> <button class='btn btn-danger'>Complete</button>  </td>";
        }
        "</td>";
        echo "<td><input type='submit' name='delete' value='Delete' class='btn btn-danger' /></td>";
        echo "<td><a href='edit.php?id=".$row['id']."' class='btn btn-info'>Edit</a></td>";
        echo "</tr>";
        echo "</form>"; //added
    }
?>
</table>
<?php
}
else
{
    echo "<br><br>No Record Found";
    
}
?>
<a href="addtodo.php" class="btn btn-primary">Add New Todo</a>
</div>
<?php
require_once 'footer.php';
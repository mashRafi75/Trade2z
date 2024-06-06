<?php
include 'connection.php';

if(isset($_POST['submit'])){
    $User_Id = $_POST['User_Id'];
    
    // Check if the user exists
    $stmt = $con->prepare("SELECT 1 FROM userinfo WHERE user_id = ?");
    $stmt->bindParam(1, $User_Id, PDO::PARAM_INT);
    $stmt->execute();
    
    if($stmt->rowCount() > 0){
        // User exists, insert into expert table
        $stmt = $con->prepare("INSERT INTO expert (user_id, n_blog, n_session, exp_payment) VALUES (?, '0', '0', '0')");
        $stmt->bindParam(1, $User_Id, PDO::PARAM_INT);
        
        if($stmt->execute()){
            echo "<script> alert('Expert added successfully!'); </script>";
        }
        else{
            echo "<script> alert('Error inserting expert!'); </script>";
        }                    
    }
    else{
        echo "<script> alert('No user exists with this user Id!'); </script>";
    }
    //header('location:expert.php');
    //exit; // Always exit after header redirect
}
?>






<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
<div class="button-add-user">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" 
    data-bs-target="#exampleModal" data-bs-whatever="@mdo">Add Expert</button>
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Expert</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
       
        <div class="mb-3">
            <label for="recipient-name" class="col-form-label">User ID:</label>
            <input type="text" class="form-control" id="recipient-name" name="User_Id">
        </div>
        <div class="modal-footer">
            <button type="submit" name="submit" class="btn btn-primary">Confirm</button>
        </div>
    
            </div>
          </div>
        </div>
      </div>
</div>
</form>
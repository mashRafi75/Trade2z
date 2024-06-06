<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trade2z - update user</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <?php
    session_start();
    include 'connection.php';
    $_SESSION["id"]= $_GET['user_id'];
    $id = $_SESSION["id"];
    $statement = $con -> prepare("SELECT * FROM userinfo WHERE user_id = $id");
    $statement->execute();
    $table = $statement -> fetch();

  ?>
<div class="container w-50">
  <form method="POST" action="userupdate.php" enctype="multipart/form-data">
      <div class="">
        <label for="recipient-name" class="col-form-label">img:</label>
        <input type="file" class="form-control" id="recipient-name" accept=".jpg,.png,.jpeg" name="img">
      </div>
      <div class="">
        <label for="recipient-name" class="col-form-label">Name:</label>
        <input type="text" class="form-control" id="recipient-name" name="Name" value="<?php echo $table['name']?>">
      </div>
      <div class="">
        <label for="recipient-name" class="col-form-label">Email:</label>
        <input type="text" class="form-control" id="recipient-name" name="Email" value="<?php echo $table['email']?>">
      </div>
      <div class="">
        <label for="recipient-name" class="col-form-label">Country:</label>
        <input type="text" class="form-control" id="recipient-name" name="Country" value="<?php echo $table['country']?>">
      </div>
      <div class="">
        <label for="recipient-name" class="col-form-label">Region:</label>
        <input type="text" class="form-control" id="recipient-name" name="Region" value="<?php echo $table['region']?>">
      </div>
      
      <div class="modal-footer">
        <button type="submit" name="submit" value="<?php echo $id ?>" class="btn btn-primary">Update</button>
      </div>
  </form>
</div>
    <script src="../js/script.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
</body>
</html>
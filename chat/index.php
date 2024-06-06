<?php
session_start();

if(isset($_SESSION["user_id"])){

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Group Chat</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <h1>Group Chat</h1>
  <div class="chat">
    <h2>Welcome to User ID :  <span><?= $_SESSION["user_id"]?></span></h2>
    <div class="msg">
      


    </div>
    <div class="input_msg">
      <input type="text" placeholder="Write your message here" id="input_msg">
      <button onclick="update()">Send</button>
    </div>
  </div>
</body>
<script src="js/script.js"></script>

</html>

<?php
}

else{

}
?>
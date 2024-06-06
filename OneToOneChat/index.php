
<?php

session_start();
require '../db_connect/db_connection.php'; 

$send='';

if(isset($_SESSION["user_id"])){$id=$_SESSION["user_id"];}

/*
if(isset($_POST['Chat_id'])) {
    $Chat_id = $_POST['Chat_id'];
} else {
    echo "Chat_id is not set in the POST request.";
}
*/

$Chat_id=1;

if(isset($_POST["send_btn"])){
  $send=$_POST["send"];
      $q = "INSERT INTO `chat`(`id`, `msg`,`to_id`) VALUES ('$id','$send','$Chat_id')";
    $rq = mysqli_query($conn, $q);
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="tailwindcss-colors.css">
    <link rel="stylesheet" href="style.css">
    <title>Chat</title>
</head>
<body>

    <!-- start: Chat -->
    <section class="chat-section">
        <div class="chat-container">




                    <div class="conversation-top">
                        <button type="button" class="conversation-back"><i class="ri-arrow-left-line"></i></button>
                        <div class="conversation-user">
                            <img class="conversation-user-image" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8cGVvcGxlfGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60" alt="">



                            <div>
                                <div class="conversation-user-name"><?php echo htmlspecialchars($Chat_id) ?></div>
                                <div class="conversation-user-status online">online</div>
                            </div>
                        </div>
                        <div class="conversation-buttons">
                            <button type="button"><i class="ri-phone-fill"></i></button>
                            <button type="button"><i class="ri-vidicon-line"></i></button>
                            <button type="button"><i class="ri-information-line"></i></button>
                        </div>
                    </div>
                    <div class="conversation-main">
                        <ul class="conversation-wrapper">
                            <div class="coversation-divider"><span>Today</span></div>

<?php

$query = "SELECT * FROM chat WHERE ((id = $id) AND (to_id = $Chat_id)) OR ((id = $Chat_id) AND (to_id = $id))";
$result = $conn->query($query);
while($row = $result->fetch_assoc()) {

if(($row["id"]==$Chat_id) and ($row["to_id"]==$id)){
?>

                            <li class="conversation-item me">
                                <div class="conversation-item-side">
                                    <img class="conversation-item-image" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8cGVvcGxlfGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60" alt="">
                                </div>
                                <div class="conversation-item-content">

                                    <div class="conversation-item-wrapper">
                                        <div class="conversation-item-box">
                                            <div class="conversation-item-text">
                                                <p><?php echo htmlspecialchars($row['msg']) ?></p>
                                                <div class="conversation-item-time">12:30</div>
                                            </div>
                                            <div class="conversation-item-dropdown">
                                                <button type="button" class="conversation-item-dropdown-toggle"><i class="ri-more-2-line"></i></button>
                                                <ul class="conversation-item-dropdown-list">
                                                    <li><a href="#"><i class="ri-share-forward-line"></i> Forward</a></li>
                                                    <li><a href="#"><i class="ri-delete-bin-line"></i> Delete</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

<?php

}
if(($row["to_id"]==$Chat_id) and ($row["id"]==$id)){
?>

                            <li class="conversation-item">
                                <div class="conversation-item-side">
                                    <img class="conversation-item-image" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8cGVvcGxlfGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60" alt="">
                                </div>
                                <div class="conversation-item-content">

                                    <div class="conversation-item-wrapper">
                                        <div class="conversation-item-box">
                                            <div class="conversation-item-text">
                                                <p><?php echo htmlspecialchars($row['msg']) ?></p>
                                                <div class="conversation-item-time">12:30</div>
                                            </div>
                                            <div class="conversation-item-dropdown">
                                                <button type="button" class="conversation-item-dropdown-toggle"><i class="ri-more-2-line"></i></button>
                                                <ul class="conversation-item-dropdown-list">
                                                    <li><a href="#"><i class="ri-share-forward-line"></i> Forward</a></li>
                                                    <li><a href="#"><i class="ri-delete-bin-line"></i> Delete</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

<?php
}
}                
?>

                        </ul>





                    </div>

                <form action="../OneToOneChat/index.php" method="POST" >  
                    <div class="conversation-form">
                        <button type="button" class="conversation-form-button"><i class="ri-emotion-line"></i></button>
                        <div class="conversation-form-group">
                            <textarea class="conversation-form-input" rows="1" name="send" placeholder="Type here..."></textarea>
                            <button type="button" class="conversation-form-record"><i class="ri-mic-line"></i></button>
                        </div>
                        <button type="submit" name="send_btn"  class="conversation-form-button conversation-form-submit"><i class="ri-send-plane-2-line" ></i></button>
                    </div>
                </form>  




        </div>
    </section>
    <!-- end: Chat -->
    
    <script src="script.js"></script>
</body>
</html>









<!--
<form action="../OneToOneChat/index.php" method="POST">
    <div class="conversation-form">
        <button type="button" class="conversation-form-button"><i class="ri-emotion-line"></i></button>
        <div class="conversation-form-group">
            <textarea class="conversation-form-input" rows="1" name="send" placeholder="Type here..."></textarea>
            <button type="button" class="conversation-form-record"><i class="ri-mic-line"></i></button>
        </div>

        <button type="submit" class="conversation-form-button conversation-form-submit" name="send_btn"><i class="ri-send-plane-2-line"></i></button>
    </div>
</form>

-->